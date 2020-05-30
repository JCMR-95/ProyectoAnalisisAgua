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
            <h1>Información del Río Loa</h1>
            <img src = "storage/Grafico.jpeg"/>
        </div>
        <div>
        <div class="zonaRio" align="center">
            <h3>Seleccione Zona</h3>

            <form method="POST" action="{{ route('verDetalles') }}" enctype="multipart/form-data" id="form-id">
                {{ csrf_field() }}


                <select id="sector"
                        name="sector"
                        class="ol-sm-2 col-form-label"
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
                            {{ __('Ver Información') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>

        <div class="tituloRio" align="center">
            <h1>Ver sección del Río</h1>
        </div>
        <div class="page-content">
            <form method="POST" action="{{ route('verEstado') }}" enctype="multipart/form-data" id="form-id-detalle">
                {{ csrf_field() }}
                <div class="form-group justify-content-center row">
                    <label for="idPuntoRio" class="col-sm-2 col-form-label">Sección del río Loa</label>
                    <div class="col-sm-4">
                        <select id="idPuntoRio"
                                name="sector"
                                class="form-control sector"
                                data-dependent="fecha"
                                required>
                            <option value ="">Seleccione una sección del río</option>
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
                        <select id="fecha" name="fecha" class="form-control">
                            <option value="">Seleccione una fecha</option>
                        </select>
                    </div>
                </div>
                <div class="form-group justify-content-center row">
                    <button type="submit" class="btn btn-primary details">
                        {{ __('Ver Información') }}
                    </button>
                </div>
            </form>
        </div>
        <button type="submit" class="btn btn-primary">
            <a href=" {{route('exportarHistorico')}} " class="btn btn-primary"> Exportar Excel </a>
        </button>
        <div class="flash-message"></div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.sector').change(function(){
           if($(this).val() != ''){
               var select = $(this).attr("id");
               var value = $(this).val();
               var dependent = $(this).data('dependent');
               var _token = $('input[name="_token"]').val();
               $.ajax({
                   url:'GetFechas',
                   method:'POST',
                   data:{select:select, value:value, _token:_token, dependent:dependent},
                   success:function(result)
                   {
                       $('#'+dependent).html(result);
                   }
               })
           }
        });
        $('#idPuntoRio').change(function(){
            $('#fecha').val('');
        });
        $('.details').click(function(e){
            $('div.mensajeFinal').remove();
            e.preventDefault();
            let myForm = document.getElementById('form-id-detalle');
            let formData = new FormData(myForm);
            $.ajax({
                type: 'POST',
                url: 'GetEstado',
                data: formData,
                success: function (data) {
                    $('div.flash-message').html(data);
                },
                processData: false,
                contentType: false,
            })
        })
    })

</script>