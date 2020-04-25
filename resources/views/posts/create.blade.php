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
                <div class="form-group">
                    <label for="title">Titre de l'article</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Saisissez le titre de l'article" value="{{isset($post) ? $post->title : ''}}">
                </div>

                <div class="form-group">
                    <label for="description">Description de l'article</label>
                    <textarea class="form-control" name="description" id="description" cols="5" rows="5">{{isset($post) ? $post->description : ''}}
                    </textarea>
                </div>

                <div class="form-group">
                    <label for="content">Contenu de l'article</label>
                    <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
                    <trix-editor input="content"></trix-editor>
                </div>

                <div class="form-group">
                    <label for="published_at">Date de publication</label>
                    <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at : ''}}" >
                </div>

                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('/storage/'.$post->image)}}" alt="" style="width:100px">
                    </div>
                @endif

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
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
    <script>
        flatpickr('#published_at', {
            enableTime: true,
            "locale" : "fr"
        });

    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
