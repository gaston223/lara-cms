@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header h5">
            {{isset($category) ? 'Editer une Catégorie' : 'Créer une catégorie'}}
        </div>
        <div class="card-body">
            <form action="{{isset($category)? route('categories.update', $category->id): route('categories.store')}}" method="POST">
                @csrf
                @if(isset($category))
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
                    <button class="btn btn-success">{{isset($category)? 'Editer une catégorie' : 'Ajouter une Catégorie'}}</button>
                </div>
            </form>
        </div>
    </div>

@endsection
