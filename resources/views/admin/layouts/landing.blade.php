@extends('admin.index')
@section('content')
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Tableau de bord</h5>
                        <span>Voici les statistique de votre systeme</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index.html"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Tableau de bord</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">

                        <div class="col-md-12 col-xl-8">
                            <div class="card sale-card">
                                <div class="card-header">
                                    <h5>Historique de reservation</h5>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" class="chart-shadow" style="height:380px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-xl-4">
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Nombre de livres</h6>
                                            <h3 class="f-w-700 text-c-blue">{{\App\Book::all()->count()}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye bg-c-blue"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Nombre de prise</h6>
                                            <h3 class="f-w-700 text-c-green">{{\App\Prise::all()->count()}}</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-bullseye bg-c-green"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card comp-card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-b-25">Nombre de reservation</h6>
                                            <h3 class="f-w-700 text-c-yellow">{{\App\Reservation::all()->count()}}</h3>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-hand-paper bg-c-yellow"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection