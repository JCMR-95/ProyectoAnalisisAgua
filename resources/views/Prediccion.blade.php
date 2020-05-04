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

<div class="flash-message"></div>

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
                <input type="date" id="fecha" name="fecha" class="form-control">
            </div>
            <small id="error" class="fecha text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="arsenico" class="col-sm-2 col-form-label">Ingrese la cantidad de Arsénico</label>
            <div class="col-sm-4">
                <input type="text" id="arsenico" name="arsenico" class="form-control">
            </div>
            <small id="error" class="arsenico text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="boro" class="col-sm-2 col-form-label">Ingrese la cantidad de Boro</label>
            <div class="col-sm-4">
                <input type="text" id="boro" name="boro" class="form-control">
            </div>
            <small id="error" class="boro text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cloro" class="col-sm-2 col-form-label">Ingrese la cantidad de Cloro</label>
            <div class="col-sm-4">
                <input type="text" id="cloro" name="cloro" class="form-control">
            </div>
            <small id="error" class="cloro text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cobalto" class="col-sm-2 col-form-label">Ingrese la cantidad de Cobalto</label>
            <div class="col-sm-4">
                <input type="text" id="cobalto" name="cobalto" class="form-control">
            </div>
            <small id="error" class="cobalto text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cobre" class="col-sm-2 col-form-label">Ingrese la cantidad de Cobre</label>
            <div class="col-sm-4">
                <input type="text" id="cobre" name="cobre" class="form-control">
            </div>
            <small id="error" class="cobre text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="cromo" class="col-sm-2 col-form-label">Ingrese la cantidad de Cromo</label>
            <div class="col-sm-4">
                <input type="text" id="cromo" name="cromo" class="form-control">
            </div>
            <small id="error" class="cromo text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="ph" class="col-sm-2 col-form-label">Ingrese la cantidad de PH</label>
            <div class="col-sm-4">
                <input type="text" id="ph" name="ph" class="form-control">
            </div>
            <small id="error" class="ph text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="plomo" class="col-sm-2 col-form-label">Ingrese la cantidad de Plomo</label>
            <div class="col-sm-4">
                <input type="text" id="plomo" name="plomo" class="form-control">
            </div>
            <small id="error" class="plomo text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="zinc" class="col-sm-2 col-form-label">Ingrese la cantidad de Zinc</label>
            <div class="col-sm-4">
                <input type="text" id="zinc" name="zinc" class="form-control">
            </div>
            <small id="error" class="zinc text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="condElectric" class="col-sm-2 col-form-label">Ingrese la cantidad de Conductividad Eléctrica</label>
            <div class="col-sm-4">
                <input type="text" id="condElectric" name="condElectric" class="form-control">
            </div>
            <small id="error" class="condElectric text-danger"></small>
        </div>
        <div class="form-group justify-content-center row">
            <label for="bico3" class="col-sm-2 col-form-label">Ingrese la cantidad de BiCO3</label>
            <div class="col-sm-4">
                <input type="text" id="bico3" name="bico3" class="form-control">
            </div>
            <small id="error" class="bico3 text-danger"></small>
        </div>
        

        <div class="form-group justify-content-center row">
            <button type="submit" class="btn btn-primary">
                {{ __('Ver Información') }}
            </button>
        </div>
    </form>
</div>
<button type="submit" class="btn btn-primary">
                        <a href=" {{route('exportarPredicciones')}} " class="btn btn-primary"> Exportar Excel </a>
</button>
</body>
</html>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".btn-primary").click(function(e){
        e.preventDefault();
        let myForm = document.getElementById('form-id');
        let formData = new FormData(myForm);
        $.ajax({
            type:'POST',
            url:'VerPrediccion',
            data: formData,
            success:function(data) {
                $('#error').html("");
                $('html, body').animate({ scrollTop: 0 }, 0);
                $('div.flash-message').html(data);
                document.getElementById("form-id").reset();
            },
            error: function(data){
                $('html, body').animate({ scrollTop: 0 }, 0);
                $('#error').html("");
                if(data.responseJSON.errors.fecha != null){
                    $('.fecha').text(data.responseJSON.errors.fecha[0]);
                }
                if(data.responseJSON.errors.arsenico != null){
                    $('.arsenico').text(data.responseJSON.errors.arsenico[0]);
                }
                if(data.responseJSON.errors.boro != null){
                    $('.boro').text(data.responseJSON.errors.boro[0]);
                }
                if(data.responseJSON.errors.cloro != null){
                    $('.cloro').text(data.responseJSON.errors.cloro[0]);
                }
                if(data.responseJSON.errors.cobalto!= null){
                    $('.cobalto').text(data.responseJSON.errors.cobalto[0]);
                }
                if(data.responseJSON.errors.cobre != null){
                    $('.cobre').text(data.responseJSON.errors.cobre[0]);
                }
                if(data.responseJSON.errors.cromo!= null){
                    $('.cromo').text(data.responseJSON.errors.cromo[0]);
                }
                if(data.responseJSON.errors.ph!= null){
                    $('.ph').text(data.responseJSON.errors.ph[0]);
                }
                if(data.responseJSON.errors.plomo!= null){
                    $('.plomo').text(data.responseJSON.errors.plomo[0]);
                }
                if(data.responseJSON.errors.zinc != null){
                    $('.zinc').text(data.responseJSON.errors.zinc[0]);
                }
                if(data.responseJSON.errors.condElectric!= null){
                    $('.condElectric').text(data.responseJSON.errors.condElectric[0]);
                }
                if(data.responseJSON.errors.bico3 != null){
                    $('.bico3').text(data.responseJSON.errors.bico3[0]);
                }
            },
            processData: false,
            contentType: false,
        });
    });
</script>