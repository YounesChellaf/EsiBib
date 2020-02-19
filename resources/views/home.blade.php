@extends('welcome')

@section('content')
    <main role="main">

        <section class="jumbotron text-center" style="background-image: url({{asset('assets/images/esi.jpg')}})">
            <div class="container">
                <h1 class="jumbotron-heading" >La bibiotheque de l'ESI vous sohaite la bienvenu</h1>
                <p>
                </p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach(\App\Book::all() as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{asset('assets/images/book.jpeg')}}" style="height: 170px" alt="Card image cap">
                            <div class="card-body">
                                <div class="row container">
                                    <div class="row">
                                        <h4>{{$book->title}}</h4>
                                        <label class="alert alert-danger " style="margin-right: 2%">{{$book->domaine->libelle}}</label>
                                        <label class="alert alert-info ">{{$book->type->libelle}}</label>
                                    </div>
                                    <p class="card-text">
                                        {{$book->description}}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-get-{{$book->id}}" style="margin-right: 3%">Prendre</button>
                                        <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal-reserve-{{$book->id}}">Réserver</button>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </main>

    @foreach(\App\Book::all() as $book)
        <div class="modal" tabindex="-1" role="dialog" id="modal-get-{{$book->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Demander de prendre votre livre de chez nous !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="" class="alert alert-danger">La prise du livre sera pour durée maximale de 20 jours, veuillez remmetre le livre avant dépasser cette periode s'il vous plait</label>
                        <form method="post" action="{{route('prises.store')}}" >
                            @csrf
                            <div class="form-group">
                                <label class="control-label" >Nom :</label>
                                <input class="form-control" type="text" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Prénom :</label>
                                <input class="form-control" type="text" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Numero carte etudiant :</label>
                                <input class="form-control" type="text" name="card_student" required>
                            </div>
                            <input type="hidden" name="book_id" value="{{$book->id}}">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Demander la prise</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modal-reserve-{{$book->id}}">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reserver votre livre de chez nous !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="" class="alert alert-success">Dés que le livre sera disponible, vous pouvez le prendre selon votre ordre dans la reservation</label>
                        <form method="post" action="{{route('reserves.store')}}" >
                            @csrf
                            <div class="form-group">
                                <label class="control-label" >Nom :</label>
                                <input class="form-control" type="text" name="last_name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Prénom :</label>
                                <input class="form-control" type="text" name="first_name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Numero carte etudiant :</label>
                                <input class="form-control" type="text" name="card_student" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label" >Date que vous voulez le prendre  :</label>
                                <input class="form-control" type="date" name="getting_date" required>
                            </div>
                            <input type="hidden" name="book_id" value="{{$book->id}}">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-info waves-effect waves-light">Réserver votre livre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
