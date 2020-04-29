@extends('layouts.app')


@section('content')

    <div class="card card-default">
        <div class="card-header h5">
            {{isset($tag) ? 'Editer un Tag' : 'Créer un tag'}}
        </div>
        <div class="card-body">
            <form action="{{isset($tag)? route('tags.update', $tag->id): route('tags.store')}}" method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')
                @endif

                <div class="form-group @error('name')has-danger @enderror">
                    <label for="name">Nom de la catégorie</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Saisissez le nom de la catégorie" value="{{isset($category)? $category->name : '' }}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-success">{{isset($tag)? 'Editer un tag' : 'Ajouter un Tag'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection


