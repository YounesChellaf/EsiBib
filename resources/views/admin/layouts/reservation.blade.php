@extends('admin.index')
@section('content')

    <div class="page-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header table-card-header">
                        <h5>La liste des reservation</h5>
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
                                    <th>Date</th>
                                    <th>Etat de demande</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Reservation::all() as $reservation)
                                    <tr>
                                        <td>{{$reservation->last_name}}</td>
                                        <td>{{$reservation->first_name}}</td>
                                        <td>{{$reservation->card_student}}</td>
                                        <td>{{$reservation->book->title}}</td>
                                        <td>{{$reservation->getting_date}}</td>
                                        <td>{{$reservation->status()}}</td>
                                        <td>
                                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-confirm-{{$reservation->id}}">Confirmer</button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-reject-{{$reservation->id}}">Rejeter</button>
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
    @foreach(\App\Reservation::all() as $reservation)
        <div class="modal" tabindex="-1" role="dialog" id="modal-confirm-{{$reservation->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmer la reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('reserves.confirm',$reservation->id)}}" >
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
        <div class="modal" tabindex="-1" role="dialog" id="modal-reject-{{$reservation->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Suppression reservation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('reserves.reject',$reservation->id)}}" >
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
    @endforeach
@endsection