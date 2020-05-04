@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">Utilisateurs</div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img width="40px" height="40px" style="border-radius:50%" src="{{$user->image}}" alt="">
                            </td>

                            <td>
                                {{$user->name}}
                            </td>
                            <td>
                                {{$user->email}}
                            </td>

                            <td>
                                @if(!$user->isAdmin())
                                    <form action="{{route('users.make-admin', $user->id)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-info btn-sm" type="submit"><i class="fas fa-user-plus"></i> Attribuer le Role Admin</button>
                                    </form>

                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Pas encore d'utilisateurs... 😊 </h3>
            @endif
        </div>
    </div>
@endsection
