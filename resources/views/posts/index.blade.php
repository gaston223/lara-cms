@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mr-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right mb-2"><i class="fas fa-user-plus"></i> Ajouter un Article</a>
    </div>

    <div class="card card-default">
        <div class="card-header"></div>
        <div class="card-body">
            @if($posts->count()>0)
                <table class="table">
                    <thead>
                        <th>Image</th>
                        <th>Titre</th>
                        <th>Categorie</th>
                        <th></th>
                    </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{asset('/storage/'.$post->image)}}" width="90px" alt="Image de l'article"></td>

                            <td>
                               {{$post->title}}
                            </td>
                            <td>
                                <a href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a>
                            </td>
                            @if($post->trashed())
                            <td>
                                <form action="{{route('restore-posts', $post->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-trash-restore"></i>  Restaurer</button>
                                </form>
                            </td>
                           @else
                                <td>
                                    <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Editer</a>
                                </td>
                            @endif
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="handleDelete({{$post->id}})"><i class="fas fa-trash"></i>   {{$post->trashed() ? 'Supprimer' : 'Archiver'}}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <h3 class="text-center">Pas d'articles en ce moment... 😊 </h3>
            @endif
        </div>
    </div>
@endsection
