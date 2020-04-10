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
    <form method="POST" action="{{ route('verPrediccion') }}" enctype="multipart/form-data" id="form-id">
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
            <label for="fecha" class="col-sm-2 col-form-label">Ingrese Fecha</label>
            <div class="col-sm-4">
                <input type="text" id="fecha" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="aluminio" class="col-sm-2 col-form-label">Ingrese la cantidad de Aluminio</label>
            <div class="col-sm-4">
                <input type="text" id="aluminio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadAluminio" class="col-sm-2 col-form-label">Ingrese unidad de Aluminio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadAluminio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="arsenico" class="col-sm-2 col-form-label">Ingrese la cantidad de Arsénico</label>
            <div class="col-sm-4">
                <input type="text" id="arsenico" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadArsenico" class="col-sm-2 col-form-label">Ingrese unidad de Arsénico</label>
            <div class="col-sm-4">
                <input type="text" id="unidadArsenico" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="boro" class="col-sm-2 col-form-label">Ingrese la cantidad de Boro</label>
            <div class="col-sm-4">
                <input type="text" id="boro" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadBoro" class="col-sm-2 col-form-label">Ingrese unidad de Boro</label>
            <div class="col-sm-4">
                <input type="text" id="unidadBoro" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cloro" class="col-sm-2 col-form-label">Ingrese la cantidad de Cloro</label>
            <div class="col-sm-4">
                <input type="text" id="cloro" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadCloro" class="col-sm-2 col-form-label">Ingrese unidad de Cloro</label>
            <div class="col-sm-4">
                <input type="text" id="unidadCloro" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cadmio" class="col-sm-2 col-form-label">Ingrese la cantidad de Cadmio</label>
            <div class="col-sm-4">
                <input type="text" id="cadmio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadCadmio" class="col-sm-2 col-form-label">Ingrese unidad de Cadmio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadCadmio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="calcio" class="col-sm-2 col-form-label">Ingrese la cantidad de Calcio</label>
            <div class="col-sm-4">
                <input type="text" id="calcio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadCalcio" class="col-sm-2 col-form-label">Ingrese unidad de Calcio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadCalcio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cobre" class="col-sm-2 col-form-label">Ingrese la cantidad de Cobre</label>
            <div class="col-sm-4">
                <input type="text" id="cobre" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadCobre" class="col-sm-2 col-form-label">Ingrese unidad de Cobre</label>
            <div class="col-sm-4">
                <input type="text" id="unidadCobre" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cromo" class="col-sm-2 col-form-label">Ingrese la cantidad de Cromo</label>
            <div class="col-sm-4">
                <input type="text" id="cromo" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadCromo" class="col-sm-2 col-form-label">Ingrese unidad de Cromo</label>
            <div class="col-sm-4">
                <input type="text" id="unidadCromo" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="hierro" class="col-sm-2 col-form-label">Ingrese la cantidad de Hierro</label>
            <div class="col-sm-4">
                <input type="text" id="hierro" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadHierro" class="col-sm-2 col-form-label">Ingrese unidad de Hierro</label>
            <div class="col-sm-4">
                <input type="text" id="unidadHierro" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="fosfato" class="col-sm-2 col-form-label">Ingrese la cantidad de Fosfato</label>
            <div class="col-sm-4">
                <input type="text" id="fosfato" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadFosfato" class="col-sm-2 col-form-label">Ingrese unidad de Fosfato</label>
            <div class="col-sm-4">
                <input type="text" id="unidadFosfato" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="magnesio" class="col-sm-2 col-form-label">Ingrese la cantidad de Magnesio</label>
            <div class="col-sm-4">
                <input type="text" id="magnesio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadMagnesio" class="col-sm-2 col-form-label">Ingrese unidad de Magnesio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadMagnesio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="manganeso" class="col-sm-2 col-form-label">Ingrese la cantidad de Manganeso</label>
            <div class="col-sm-4">
                <input type="text" id="manganeso" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadManganeso" class="col-sm-2 col-form-label">Ingrese unidad de Manganeso</label>
            <div class="col-sm-4">
                <input type="text" id="unidadManganeso" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="molibdeno" class="col-sm-2 col-form-label">Ingrese la cantidad de Molibdeno</label>
            <div class="col-sm-4">
                <input type="text" id="molibdeno" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadMolibdeno" class="col-sm-2 col-form-label">Ingrese unidad de Molibdeno</label>
            <div class="col-sm-4">
                <input type="text" id="unidadMolibdeno" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="nitrato" class="col-sm-2 col-form-label">Ingrese la cantidad de Nitrato</label>
            <div class="col-sm-4">
                <input type="text" id="nitrato" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadNitrato" class="col-sm-2 col-form-label">Ingrese unidad de Nitrato</label>
            <div class="col-sm-4">
                <input type="text" id="unidadNitrato" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="niquel" class="col-sm-2 col-form-label">Ingrese la cantidad de Niquel</label>
            <div class="col-sm-4">
                <input type="text" id="niquel" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadNiquel" class="col-sm-2 col-form-label">Ingrese unidad de Niquel</label>
            <div class="col-sm-4">
                <input type="text" id="unidadNiquel" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="oxigeno" class="col-sm-2 col-form-label">Ingrese la cantidad de Oxígeno</label>
            <div class="col-sm-4">
                <input type="text" id="oxigeno" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadOxigeno" class="col-sm-2 col-form-label">Ingrese unidad de Oxígeno</label>
            <div class="col-sm-4">
                <input type="text" id="unidadOxigeno" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="ph" class="col-sm-2 col-form-label">Ingrese la cantidad de PH</label>
            <div class="col-sm-4">
                <input type="text" id="ph" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadPH" class="col-sm-2 col-form-label">Ingrese unidad de PH</label>
            <div class="col-sm-4">
                <input type="text" id="unidadPH" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="plata" class="col-sm-2 col-form-label">Ingrese la cantidad de Plata</label>
            <div class="col-sm-4">
                <input type="text" id="plata" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadPlata" class="col-sm-2 col-form-label">Ingrese unidad de Plata</label>
            <div class="col-sm-4">
                <input type="text" id="unidadPlata" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="plomo" class="col-sm-2 col-form-label">Ingrese la cantidad de Plomo</label>
            <div class="col-sm-4">
                <input type="text" id="plomo" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadPlomo" class="col-sm-2 col-form-label">Ingrese unidad de Plomo</label>
            <div class="col-sm-4">
                <input type="text" id="unidadPlomo" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="potasio" class="col-sm-2 col-form-label">Ingrese la cantidad de Potasio</label>
            <div class="col-sm-4">
                <input type="text" id="potasio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadPotasio" class="col-sm-2 col-form-label">Ingrese unidad de Potasio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadPotasio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="selenio" class="col-sm-2 col-form-label">Ingrese la cantidad de Selenio</label>
            <div class="col-sm-4">
                <input type="text" id="selenio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadSelenio" class="col-sm-2 col-form-label">Ingrese unidad de Selenio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadSelenio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="sodio" class="col-sm-2 col-form-label">Ingrese la cantidad de Sodio</label>
            <div class="col-sm-4">
                <input type="text" id="sodio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadSodio" class="col-sm-2 col-form-label">Ingrese unidad de Sodio</label>
            <div class="col-sm-4">
                <input type="text" id="unidadSodio" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="zinc" class="col-sm-2 col-form-label">Ingrese la cantidad de Zinc</label>
            <div class="col-sm-4">
                <input type="text" id="zinc" class="form-control">
            </div>
        </div>
        <div class="form-group justify-content-center row">
            <label for="unidadZinc" class="col-sm-2 col-form-label">Ingrese unidad de Zinc</label>
            <div class="col-sm-4">
                <input type="text" id="unidadZinc" class="form-control">
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