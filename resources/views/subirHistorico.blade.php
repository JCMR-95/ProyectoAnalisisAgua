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
    <h1>Información del Río Loa</h1>

    <img src = "storage/Grafico.jpeg"/>

    <h3>Seleccione Zona y Elementos Químicos</h3>

    <form method="POST" action="{{ route('verDetalles') }}" enctype="multipart/form-data" id="form-id">
        {{ csrf_field() }}


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

        <div class="col-md-3">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Ver Toda la Información') }}
                </button>
            </div>
        </div>
        </div>

    </form>

    <form method="POST" action="{{ route('verDetallesEspecificos') }}" enctype="multipart/form-data" id="form-id">
        {{ csrf_field() }}


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

        <div class="col-md-3">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">
                    {{ __('Ver Información Importante') }}
                </button>
            </div>
        </div>
        </div>

    </form>

    <h1>Importar datos</h1>

    <form action="{{ route('import.quimicosRio') }}" method="post" enctype="multipart/form-data">
        @csrf

        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif

        <input type="file" name="file">

        <button>Importar Excel - Químicos del Río</button>
    </form>

    <form action="{{ route('import.infoRio') }}" method="post" enctype="multipart/form-data">
        @csrf

        @if(Session::has('message'))
            <p>{{ Session::get('message') }}</p>
        @endif

        <input type="file" name="file">

        <button>Importar Excel - Información del Río</button>
    </form>

</body>
</html>