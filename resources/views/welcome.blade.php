
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Le site du bibiotheque de l'ESI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
</head>

<body>

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">Sur le site web</h4>
                    <p class="text-muted">L'application EsiBib est une application pour la gestion des ouvrages du bibiothéque de l'école superieure d'informatique.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Operations</h4>
                    <ul class="list-unstyled">
                        @if(auth()->user())
                            <li><a href="{{route('admin')}}" class="text-white">Tablaux de bord</a></li>
                            @else
                            <li><a href="{{route('login')}}" class="text-white">Se connecter</a></li>
                            @endif

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <strong>ESI Bib</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

@yield('content')

{{--<footer class="text-muted">--}}
    {{--<div class="container">--}}
        {{--<p class="float-right">--}}
            {{--<a href="#">Back to top</a>--}}
        {{--</p>--}}
        {{--<p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>--}}
        {{--<p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>--}}
    {{--</div>--}}
{{--</footer>--}}

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/holder.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-slim.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $("#listSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();

            $("#books card").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

</body>
</html>
