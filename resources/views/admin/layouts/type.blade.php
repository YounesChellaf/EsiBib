@extends('admin.index')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>La liste des types</h5>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#model">Ajouter un nouveau type</button>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Libelle</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Type::all() as $type)
                                    <tr>
                                        <td>{{$type->libelle}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-update-{{$type->id}}">Modifier</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$type->id}}">Supprimer</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="model">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nouveau type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('types.store')}}" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label" >Libelle :</label>
                            <input class="form-control" type="text" name="libelle">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach(\App\Type::all() as $type)
        <div class="modal" tabindex="-1" role="dialog" id="modal-update-{{$type->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mis á jour type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('types.update',$type->id)}}" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="control-label" >Libelle :</label>
                                <input class="form-control" type="text" name="libelle" value="{{$type->libelle}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Mettre á jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-delete-{{$type->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('types.destroy',$type->id)}}" >
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <span>Etes vous sure de supprimer ce type du systeme !</span>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection