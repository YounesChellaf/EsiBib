@extends('admin.index')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>La liste des lecteurs</h5>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#model">Ajouter un nouveau user</button>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Matricule</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\User::all() as $user)
                                    <tr>
                                        <td>{{$user->last_name}}</td>
                                        <td>{{$user->first_name}}</td>
                                        <td>{{$user->num_card}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-update-{{$user->id}}">Modifier</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$user->id}}">Supprimer</button>
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
                    <h5 class="modal-title">Nouveau lecteur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('users.store')}}" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label" >Nom :</label>
                            <input class="form-control" type="text" name="last_name">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Prénom :</label>
                            <input class="form-control" type="text" name="first_name">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Numero matricule :</label>
                            <input class="form-control" type="text" name="num_card">
                        </div>
                        <div class="form-group">
                            <label for="">Categorie lecteurs :</label>
                            <select name="role" class="form-control">
                                <option value=""></option>
                                <option value="etudiant cycle classique">etudiant cycle classique</option>
                                <option value="5 eme annee">5 eme annee</option>
                                <option value="etudiant nouveau cycle">etudiant nouveau cycle</option>
                                <option value="enseignent extern">enseignent extern</option>
                                <option value="personnel">personnel</option>
                                <option value="enseignent">enseignent</option>
                                <option value="agents">agents</option>
                                <option value="Magister doctoral">Magister doctoral</option>
                                <option value="invité">invité</option>
                                <option value="1cp">1cp</option>
                                <option value="2cp">2cp</option>
                                <option value="1cs">1cs</option>
                                <option value="2cs">2cs</option>
                                <option value="3cs">3cs</option>
                            </select>
                        </div>
                        <input type="hidden" name="email" value="test@gmail.com">
                        <input type="hidden" name="password" value="{{Hash::make('test20202020')}}">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach(\App\User::all() as $user)
        <div class="modal" tabindex="-1" role="dialog" id="modal-update-{{$user->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mis á jour user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('users.update',$user->id)}}" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="control-label" >Nom :</label>
                                <input class="form-control" type="text" name="first_name" value="{{$user->last_name}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Prénom :</label>
                                <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}">

                            </div>
                            <div class="form-group">
                                <label class="control-label" >Matricule :</label>
                                <input class="form-control" type="text" name="num_card" value="{{$user->num_card}}">
                            </div>
                            <div class="form-group">
                                <label for="">Categorie lecteurs :</label>
                                <select name="role" class="form-control">
                                    <option value="{{$user->role}}">{{$user->role}}</option>
                                    <option value="etudiant cycle classique">etudiant cycle classique</option>
                                    <option value="5 eme annee">5 eme annee</option>
                                    <option value="etudiant nouveau cycle">etudiant nouveau cycle</option>
                                    <option value="enseignent extern">enseignent extern</option>
                                    <option value="personnel">personnel</option>
                                    <option value="enseignent">enseignent</option>
                                    <option value="agents">agents</option>
                                    <option value="Magister doctoral">Magister doctoral</option>
                                    <option value="invité">invité</option>
                                    <option value="1cp">1cp</option>
                                    <option value="2cp">2cp</option>
                                    <option value="1cs">1cs</option>
                                    <option value="2cs">2cs</option>
                                    <option value="3cs">3cs</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Mettre á jour</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-delete-{{$user->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('users.destroy',$user->id)}}" >
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <span>Etes vous sure de supprimer ce lecteur du systeme !</span>
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