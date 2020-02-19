<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>EsiBib</title>


    <!--[if lt IE 10]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    {{--<link rel="stylesheet" href="../files/bower_components/chartist/css/chartist.css" type="text/css" media="all">--}}

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/feather.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/waves.min.css')}}">
    {{--<link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome-n.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/widget.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/component.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/extension/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/extension/responsive.bootstrap4.min.css')}}">


</head>
<body>



<div class="loader-bg">
    <div class="loader-bar"></div>
</div>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">
                <div class="navbar-logo">
                    <a href="index.html">
                        <img class="img-fluid" src="../files/assets/images/logo.png" alt="Theme-Logo" />
                    </a>
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="feather icon-menu icon-toggle-right"></i>
                    </a>
                    <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                </div>
                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li class="header-search">
                            <div class="main-search morphsearch-search">
                                <div class="input-group">
<span class="input-group-prepend search-close">
<i class="feather icon-x input-group-text"></i>
</span>
                                    <input type="text" class="form-control" placeholder="Enter Keyword">
                                    <span class="input-group-append search-btn">
<i class="feather icon-search input-group-text"></i>
</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <div class="dropdown-primary dropdown">
                                <div class="dropdown-toggle" data-toggle="dropdown">
                                    <span>{{auth()->user()->first_name}}</span>
                                    <i class="feather icon-chevron-down"></i>
                                </div>
                                <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <li>
                                        <a href="#!">
                                            <i class="feather icon-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth-sign-in-social.html">
                                            <i class="feather icon-log-out"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <nav class="pcoded-navbar">
                    <div class="nav-list">
                        <div class="pcoded-inner-navbar main-menu">
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="navbar-light.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-menu"></i>
                                        </span>
                                        <span class="pcoded-mtext">Tableau de bord</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu active pcoded-trigger">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Gestion générale</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="{{route('domaines.index')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">Domaine</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('types.index')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">Type</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{route('emplacements.index')}}" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">Emplacement</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="{{route('books.index')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-book"></i>
                                        </span>
                                        <span class="pcoded-mtext">Gestion livres</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('books.index')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-bookmark"></i>
                                        </span>
                                        <span class="pcoded-mtext">Demande de prise</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{route('books.index')}}" class="waves-effect waves-dark">
                                        <span class="pcoded-micon">
                                            <i class="feather icon-book"></i>
                                        </span>
                                        <span class="pcoded-mtext">Les reservation</span>
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>

                <div class="pcoded-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/waves.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/pcoded.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/js/script.min.js')}}"></script>


{{--<script src="../files/assets/pages/chart/float/jquery.flot.js"></script>--}}
{{--<script src="../files/assets/pages/chart/float/jquery.flot.categories.js"></script>--}}
{{--<script src="../files/assets/pages/chart/float/curvedLines.js"></script>--}}
{{--<script src="../files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>--}}

{{--<script src="../files/bower_components/chartist/js/chartist.js"></script>--}}

{{--<script src="../files/assets/pages/widget/amchart/amcharts.js"></script>--}}
{{--<script src="../files/assets/pages/widget/amchart/serial.js"></script>--}}
{{--<script src="../files/assets/pages/widget/amchart/light.js"></script>--}}


<script src="{{asset('assets/js/vertical-layout.min.js')}}"></script>
<script src="{{asset('assets/js/custom-dashboard.min.js')}}"></script>

<script src="{{asset('assets/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/vfs_fonts.js')}}"></script>




<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/js/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/buttons.colVis.min.js')}}"></script>




<script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.j')}}"></script>
<script src="{{asset('assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/extension-btns-custom.js')}}"></script>

<script src="{{asset('assets/js/modal.js')}}"></script>
<script src="{{asset('assets/js/classie.js')}}"></script>
<script src="{{asset('assets/js/modalEffects.js')}}"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>


</html>
