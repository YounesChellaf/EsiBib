@extends('welcome')

@section('content')
    <main role="main">

        <section class="jumbotron text-center" style="background-image: url({{asset('assets/images/esi.jpg')}})">
            <div class="container">
                <h1 class="jumbotron-heading" >La bibiotheque de l'ESI vous sohaite la bienvenu</h1>
                <p>
                    <a href="#" class="btn btn-primary my-2">Main call to action</a>
                    <a href="#" class="btn btn-secondary my-2">Secondary action</a>
                </p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    @foreach(\App\Book::all() as $book)
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{asset('assets/images/esi.jpg')}}" style="height: 170px" alt="Card image cap">
                            <div class="card-body">
                                <div class="row container">
                                    <div class="row">
                                        <h4>{{$book->title}}</h4>
                                        <label class="alert alert-danger " style="margin-right: 2%">{{$book->domaine->libelle}}</label>
                                        <label class="alert alert-info ">{{$book->type->libelle}}</label>
                                    </div>
                                    <p class="card-text" style="height: 50px">
                                        {{$book->description}}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-outline-success" style="margin-right: 3%">View</button>
                                        <button type="button" class="btn btn-outline-warning">Edit</button>
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
@endsection
