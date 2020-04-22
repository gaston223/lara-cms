@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end">
        <a href="{{route('categories.create')}}" class="btn btn-success float-right mb-2"><i class="fas fa-user-plus"></i> Ajouter une catégorie</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Catégories
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <th>Nom de la catégorie</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->name}}</td>
                            <td class="d-flex justify-content-end">
                                <a href="{{route('categories.edit', $category->id)}}" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i> Editer</a>
                                <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})"><i class="fas fa-trash"></i> Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="POST" id="deleteCategoryForm">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Supprimer Une Catégorie</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center h5"><strong>Etes-vous sur de supprimer cette catégorie ?</strong></p>

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
            var form = document.getElementById('deleteCategoryForm');
            form.action = '/categories/' + id;
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
