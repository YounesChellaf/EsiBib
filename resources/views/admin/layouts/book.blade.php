@extends('admin.index')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>La liste des books</h5>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#model">Ajouter un nouveau book</button>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Langue</th>
                                    <th>Type</th>
                                    <th>Domaine</th>
                                    <th>Emplacement</th>
                                    <th>ISBN</th>
                                    <th>Année d'acquisition</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Book::all() as $book)
                                    <tr>
                                        <td>{{$book->title}}</td>
                                        <td>{{$book->langue}}</td>
                                        <td>{{$book->type->libelle}}</td>
                                        <td>{{$book->domaine->libelle}}</td>
                                        <td>{{'[ '.$book->emplacement->etage.' , '.$book->emplacement->code_rayoumage.' ]'}}</td>
                                        <td>{{$book->isbn}}</td>
                                        <td>{{$book->annee_acqui}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-update-{{$book->id}}">Modifier</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$book->id}}">Supprimer</button>
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
                    <h5 class="modal-title">Nouveau book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('books.store')}}" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label" >Titre :</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Description :</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Numero ISBN :</label>
                            <input class="form-control" type="text" name="isbn">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Langue :</label>
                            <input class="form-control" type="text" name="langue">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Année acquisition :</label>
                            <input class="form-control" type="text" name="annee_acqui">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Année edition :</label>
                            <input class="form-control" type="text" name="annee_edition">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Nombre de parties :</label>
                            <input class="form-control" type="text" name="nb_partie">
                        </div>
                        <div class="form-group">
                            <label class="control-label" >Nombre d'exemplaires :</label>
                            <input class="form-control" type="text" name="nb_exemplaire">
                        </div>
                        <input type="hidden" name="user_id" value="1">
                        <div class="form-group">
                            <label for="">Domaine du livre :</label>
                            <select name="domaine_id" class="form-control" >
                                <option value=""></option>
                                @foreach(\App\Domaine::all() as $domaine)
                                    <option value="{{$domaine->id}}">{{$domaine->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Type du livre :</label>
                            <select name="type_id" class="form-control" >
                                <option value=""></option>
                                @foreach(\App\Type::all() as $type)
                                    <option value="{{$type->id}}">{{$type->libelle}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Emplacement du livre :</label>
                            <select name="emplacement_id" class="form-control" >
                                <option value=""></option>
                                @foreach(\App\Emplacement::all() as $emplacement)
                                    <option value="{{$emplacement->id}}">{{'Etage : '.$emplacement->etage .' => '. $emplacement->code_rayoumage}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach(\App\Book::all() as $book)
        <div class="modal" tabindex="-1" role="dialog" id="modal-update-{{$book->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mis á jour book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('books.update',$book->id)}}" >
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label class="control-label" >Titre :</label>
                                <input class="form-control" type="text" name="title" value="{{$book->title}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Description :</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$book->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Numero ISBN :</label>
                                <input class="form-control" type="text" name="isbn" value="{{$book->isbn}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Langue :</label>
                                <input class="form-control" type="text" name="langue" value="{{$book->langue}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Année acquisition :</label>
                                <input class="form-control" type="text" name="annee_acqui" value="{{$book->annee_acqui}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Année edition :</label>
                                <input class="form-control" type="text" name="annee_edition" value="{{$book->annee_edition}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Nombre de parties :</label>
                                <input class="form-control" type="text" name="nb_partie" value="{{$book->nb_partie}}">
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Nombre d'exemplaires :</label>
                                <input class="form-control" type="text" name="nb_exemplaire" value="{{$book->nb_exemplaire}}">
                            </div>
                            <input type="hidden" name="user_id" value="1">
                            <div class="form-group">
                                <label for="">Domaine du livre :</label>
                                <select name="domaine_id" class="form-control" >
                                    <option value="{{$book->domaine->id}}">{{$book->domaine->libelle}}</option>
                                    @foreach(\App\Domaine::all() as $domaine)
                                        <option value="{{$domaine->id}}">{{$domaine->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Type du livre :</label>
                                <select name="type_id" class="form-control" >
                                    <option value="{{$book->type->id}}">{{$book->type->libelle}}</option>
                                    @foreach(\App\Type::all() as $type)
                                        <option value="{{$type->id}}">{{$type->libelle}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Emplacement du livre :</label>
                                <select name="emplacement_id" class="form-control" >
                                    <option value="{{$book->emplacement->id}}">{{'Etage : '.$book->emplacement->etage.' : '. $book->emplacement->code_rayoumage}}</option>
                                    @foreach(\App\Emplacement::all() as $emplacement)
                                        <option value="{{$emplacement->id}}">{{'Etage : '.$emplacement->etage .' => '. $emplacement->code_rayoumage}}</option>
                                    @endforeach
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
        <div class="modal" tabindex="-1" role="dialog" id="modal-delete-{{$book->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression book</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('books.destroy',$book->id)}}" >
                            @method('DELETE')
                            @csrf
                            <div class="form-group">
                                <span>Etes vous sure de supprimer ce livre du systeme !</span>
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