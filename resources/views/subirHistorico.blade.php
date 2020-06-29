<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/general.css')}}">
    <title>Subir historico</title>
</head>
<body>
    @include("navbar.navbar")
    <div class="tituloRio" align="center">
        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif
        <h1>Importar datos</h1>
            <div class="form-group justify-content-center row">
                <form action="{{ route('import.infoRio') }}" method="post" enctype="multipart/form-data">
                    <label for="file" class="col-sm-3 col-form-label">1.- Ingrese el archivo de estaciones</label>
                    @csrf
                    <input type="file" name="file">

                    <button>Importar Excel - Estación de Monitoreo</button>
                </form>
            </div>

            <div class="form-group justify-content-center row">
                <form action="{{ route('import.quimicosRio') }}" method="post" enctype="multipart/form-data">
                    <label for="file" class="col-sm-3 col-form-label">2.- Ingrese el archivo de parámetros fisicoquímicos</label>
                    @csrf
                    <input type="file" name="file">
                    <button>Importar Excel - Parámetros Fisicoquímicos</button>
                </form>
            </div>
        <button type="submit" class="btn btn-primary">
                                <a href=" {{route('completarDatos')}} " class="btn btn-primary"> Completar Datos de Histórico </a>
        </button>
    </div>

</body>
</html>
