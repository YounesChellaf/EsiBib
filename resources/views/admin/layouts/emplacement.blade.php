@extends('admin.index')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>La liste des emplacements</h5>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#model">Ajouter un nouveau emplacement</button>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Etage</th>
                                    <th>Code rayoumage</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Emplacement::all() as $emplacement)
                                    <tr>
                                        <td>{{$emplacement->etage}}</td>
                                        <td>{{$emplacement->code_rayoumage}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-update-{{$emplacement->id}}">Modifier</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$emplacement->id}}">Supprimer</button>
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
                    <h5 class="modal-title">Nouveau emplacement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('emplacements.store')}}" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label" >Etage :</label>
                            <input class="form-control" type="text" name="etage">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Code rayomage :</label>
                            <input class="form-control" type="text" name="code_rayoumage">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach(\App\Emplacement::all() as $emplacement)
        <div class="modal" tabindex="-1" role="dialog" id="modal-update-{{$emplacement->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mis á jour emplacement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('emplacements.update',$emplacement->id)}}" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="control-label" >Etage :</label>
                                <input class="form-control" type="text" name="etage" value="{{$emplacement->etage}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Code rayomage :</label>
                                <input class="form-control" type="text" name="code_rayoumage" value="{{$emplacement->code_rayoumage}}">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Mettre á jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-delete-{{$emplacement->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression emplacement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('emplacements.destroy',$emplacement->id)}}" >
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <span>Etes vous sure de supprimer cet emplacement du systeme !</span>
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