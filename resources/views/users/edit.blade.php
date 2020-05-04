@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Mon Profil</div>

        <div class="card-body">
            <form action="{{route('users.update-profile')}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group @error('name')has-danger @enderror">
                    <label for="name">Nom</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{$user->name}}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group @error('about')has-danger @enderror">
                    <label for="about">Description</label>
                    <textarea class="form-control @error('about') is-invalid @enderror" name="about" id="about" cols="5" rows="5">{{$user->about}}</textarea>
                    @error('about')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                @if(isset($user->image))
                    <div class="form-group">
                        <img src="{{$user->image}}" alt="" style="width:100px">
                    </div>
                @endif

                <div class="form-group @error('image')has-danger @enderror">
                    <label for="image">Url de l'Image</label>
                    <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                    @error('image')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success"><i class="fas fa-user-edit"></i>&nbsp; Modifier le profil</button>
            </form>
        </div>
    </div>
@endsection
