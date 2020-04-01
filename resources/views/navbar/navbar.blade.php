<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('/css/navbar.css')}}">
    </head>
    <body>
        <header id="header" role="banner">
            <section id ="branding">
                <div id="titulo-sitio" class="hfeed">
                    <div class="logo-ucn">
                        <img src="{{ Storage::url('logo-ucn.png') }}" width="300" height="70">
                    </div>
                    <div class="logo-ceitsaza">
                        <img src="{{Storage::url('logo-ceitsaza.png')}}" width="276" height="100">
                    </div>
                    <div class="titulo">
                        <div id="site-description">
                            <h2>Centro de Investigación Tecnológica del Agua en el Desierto</h2>
                        </div>
                    </div>
                </div>
            </section>
        </header>
        <nav id="menu" role="navigation">
            <div class="hfeed">
                <ul>
                    <li class="item">
                        <a class="link" href="{{url("/")}}">Inicio</a>
                    </li>
                    <li class="item">
                        <a class="link" href="{{url("/verHistorico")}}">Ver historico</a>
                    </li>
                    <li class="item">
                        <a class="link" href="{{url("/verPrediccion")}}">Ver predicción</a>
                    </li>
                    <li class="item">
                        <a class="link" href="{{url('/subir')}}">Subir historico</a>
                    </li>
                </ul>
            </div>
        </nav>

    </body>
</html>