@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header h5">{{isset($post) ? 'Éditer un article' : 'Créer un article'}}</div>
        <div class="card-body">
            <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group @error('title')has-danger @enderror">
                    <label for="title">Titre de l'article</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Saisissez le titre de l'article" value="{{isset($post) ? $post->title : ''}}">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group @error('description')has-danger @enderror">
                    <label for="description">Description de l'article</label>
                    <textarea class="form-control @error('description')has-danger @enderror" name="description" id="description" cols="5" rows="5">{{isset($post) ? $post->description : ''}}
                    </textarea>
                    @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group @error('content')has-danger @enderror">
                    <label for="content">Contenu de l'article</label>
                    <input id="content" class="form-control @error('content') is-invalid @enderror" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
                    <trix-editor input="content"></trix-editor>
                    @error('content')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group @error('published_at')has-danger @enderror">
                    <label for="published_at">Date de publication</label>
                    <input type="text" class="form-control @error('published_at') is-invalid @enderror" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at : ''}}" >
                    @error('published_at')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('/storage/'.$post->image)}}" alt="" style="width:100px">
                    </div>
                @endif

                <div class="form-group @error('image')has-danger @enderror">
                    <label for="image">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    @error('image')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group @error('category')has-danger @enderror">
                    <label for="category">Catégorie</label>
                    <select name="category" id="category" class="form-control  @error('category') is-invalid @enderror">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                            @if(isset($post))
                                @if($category->id ===$post->category_id)
                                    selected
                                @endif
                            @endif
                            > {{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    @if($tags->count() > 0)
                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}"
                                  @if(isset($post))
                                    @if($post->hasTag($tag->id))
                                      selected
                                    @endif
                                  @endif
                                >
                                    {{$tag->name}}
                                </option>
                            @endforeach
                        </select>
                    @endif
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"><i class="fas fa-folder-plus fa-lg"></i> {{isset($post) ? 'Modifier l\'article' : 'Ajouter l\'article'}} </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            enableSeconds:true,
            "locale" : "fr"
        });

        $(document).ready(function() {
            $('.tags-selector').select2();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@endsection
