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
    <title>Historico río Loa</title>
</head>
<body>
@include("navbar.navbar")
<div class="tituloRio" align="center">
    <h1>Ver predicción</h1>
</div>
<div class="page-content">
    <form method="POST" action="{{ route('verDetalles') }}" enctype="multipart/form-data" id="form-id">
        {{ csrf_field() }}
        <div class="form-group justify-content-center row">
            <label for="sector" class="col-sm-2 col-form-label">Predicción para potabilidad del agua</label>
            <div class="col-sm-4">
                <select id="sector"
                        name="sector"
                        class="form-control"
                        required>

                    <option value="001">Junta Río Salado</option>
                    <option value="002">Angostura (CA)</option>
                    <option value="003">Sifón Ayquina</option>
                    <option value="004">Pozo Chiu Chiu</option>
                    <option value="005">Yalquincha</option>
                    <option value="006">Escorial</option>
                    <option value="007">Finca</option>
                </select>
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="fecha" class="col-sm-2 col-form-label">Fecha de la medición</label>
            <div class="col-sm-4">
                <select id="fecha" class="form-control">
                    <option value="000">Ingrese una zona del río</option>
                </select>
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="elemento1" class="col-sm-2 col-form-label">Ingrese la cantidad de Elemento 1</label>
            <div class="col-sm-4">
                <input type="text" id="elemento1" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="elemento2" class="col-sm-2 col-form-label">Ingrese la cantidad de Elemento 2</label>
            <div class="col-sm-4">
                <input type="text" id="elemento2" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="elemento3" class="col-sm-2 col-form-label">Ingrese la cantidad de Elemento 3</label>
            <div class="col-sm-4">
                <input type="text" id="elemento3" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <button type="submit" class="btn btn-primary">
                {{ __('Ver Información') }}
            </button>
        </div>
    </form>
</div>
</body>
</html>