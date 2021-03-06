@extends('admin.index')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>La liste des demandes de prise</h5>
                    </div>
                    <div class="card-block">
                        <div class="dt-responsive table-responsive">
                            <table id="basic-btn" class="table table-striped table-bordered nowrap">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Carte étudiant</th>
                                    <th>Livre</th>
                                    <th>Date demande</th>
                                    <th>Etat de demande</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Prise::all() as $prise)
                                    <tr>
                                        <td>{{$prise->last_name}}</td>
                                        <td>{{$prise->first_name}}</td>
                                        <td>{{$prise->card_student}}</td>
                                        <td>{{$prise->book->title}}</td>
                                        <td>{{$prise->created_at->format('Y-m-d')}}</td>
                                        <td>{{$prise->status()}}</td>
                                        <td>
                                            @if($prise->statu == 'confirmed')
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-rendu-{{$prise->id}}">Livre Rendu</button>
                                            @elseif($prise->statu == 'fait')
                                            @else
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-confirm-{{$prise->id}}">Confirmer</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-reject-{{$prise->id}}">Rejeter</button>
                                            @endif
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

    @foreach(\App\Prise::all() as $prise)
        <div class="modal" tabindex="-1" role="dialog" id="modal-confirm-{{$prise->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mis á jour prise</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('prise.confirm',$prise->id)}}" >
                            @csrf
                            <p class="mt-5">
                                Voulez vous vraiment confirmer cette demande !
                            </p>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Confirmer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-reject-{{$prise->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression prise</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('prise.reject',$prise->id)}}" >
                            @csrf
                            <p class="mt-5">
                                Voulez vous vraiment rejeter cette demande !
                            </p>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger waves-effect waves-light">Refuser</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-rendu-{{$prise->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Livre rendu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('prise.rendu',$prise->id)}}" >
                            @csrf
                            <p class="mt-5">
                                L'étudiant a t'il rendu le livre á la bibiotheque ?
                            </p>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning waves-effect waves-light">Marqué comme rendu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection