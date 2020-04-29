@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mr-2">
        <a href="{{route('tags.create')}}" class="btn btn-success float-right mb-2"><i class="fas fa-user-plus"></i> Ajouter un tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            @if($tags->count()>0)
                <table class="table">
                    <thead>
                    <th>Nom du tag</th>
                    <th>Nombre de Posts</th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->posts->count()}}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i> Editer</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})"><i class="fas fa-trash"></i> Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Pas de tag... 😊 </h3>
        @endif

        <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteTagForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Supprimer Un Tag</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center h5"><strong>Etes-vous sur de supprimer ce tag ?</strong></p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            var form = document.getElementById('deleteTagForm');
            form.action = '/tags/' + id;
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
