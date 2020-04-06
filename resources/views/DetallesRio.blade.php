<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!DOCTYPE html>
<html>
    <head>
        <title>Información</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('/css/index.css')}}">
    </head>
    <body>
    @include("navbar.navbar")
    <table id="tablaInfo" class="table table-striped table-sm">
        <thead class="thead-dark">
            <tr>
            
                <th scope="col">Nombre Estación</th>
                <th scope="col">codBNA</th>
                <th scope="col">Altitud</th>
                <th scope="col">Cuenca</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">UTM Norte</th>
                <th scope="col">Unidad UTM Norte</th>
                <th scope="col">UTM Este</th>
                <th scope="col">Unidad UTM Este</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($datosInfo as $datoInfo)
                <tr>
                
                    <th scope="row">{!! $datoInfo->nombreEstacion !!}</th>
                    <td scope="row">{!! $datoInfo->codBNA !!}</td>
                    <td scope="row">{!! $datoInfo->altitud !!}</td>
                    <td scope="row">{!! $datoInfo->cuenca !!}</td>
                    <td scope="row">{!! $datoInfo->latitud !!}</td>
                    <td scope="row">{!! $datoInfo->longitud !!}</td>
                    <td scope="row">{!! $datoInfo->utmNorte !!}</td>
                    <td scope="row">{!! $datoInfo->unidadNorteUTM !!}</td>
                    <td scope="row">{!! $datoInfo->utmEste !!}</td>
                    <td scope="row">{!! $datoInfo->unidadEsteUTM !!}</td>
                
                </tr>
            
            @endforeach
        </tbody>
    </table>

    <table id="tablaQuimicos" class="table table-striped table-sm">
        <thead class="scrollmenu">
            <tr>
            
                <th scope="col">Fecha</th>
                <th scope="col">Aluminio</th>
                <th scope="col">Unidad Aluminio</th>
                <th scope="col">Arsénico</th>
                <th scope="col">Unidad Arsénico</th>
                <th scope="col">Boro</th>
                <th scope="col">Unidad Boro</th>
                <th scope="col">Cloro</th>
                <th scope="col">Unidad Cloro</th>
                <th scope="col">Cadmio</th>
                <th scope="col">Unidad Cadmio</th>
                <th scope="col">Calcio</th>
                <th scope="col">Unidad Calcio</th>
                <th scope="col">Cobre</th>
                <th scope="col">Unidad Cobre</th>
                <th scope="col">Cromo</th>
                <th scope="col">Unidad Cromo</th>
                <th scope="col">Hierro</th>
                <th scope="col">Unidad Hierro</th>
                <th scope="col">Fosfato</th>
                <th scope="col">Unidad Fosfato</th>
                <th scope="col">Magnesio</th>
                <th scope="col">Unidad Mangnesio</th>
                <th scope="col">Manganeso</th>
                <th scope="col">Unidad Manganeso</th>
                <th scope="col">Molibdeno</th>
                <th scope="col">Unidad Molibdeno</th>
                <th scope="col">Nitrato</th>
                <th scope="col">Unidad Nitrato</th>
                <th scope="col">Niquel</th>
                <th scope="col">Unidad Niquel</th>
                <th scope="col">Oxígeno</th>
                <th scope="col">Unidad Oxígeno</th>
                <th scope="col">PH</th>
                <th scope="col">Unidad PH</th>
                <th scope="col">Plata</th>
                <th scope="col">Unidad Plata</th>
                <th scope="col">Plomo</th>
                <th scope="col">Unidad Plomo</th>
                <th scope="col">Potasio</th>
                <th scope="col">Unidad Potasio</th>
                <th scope="col">Selenio</th>
                <th scope="col">Unidad Selenio</th>
                <th scope="col">Sodio</th>
                <th scope="col">Unidad Sodio</th>
                <th scope="col">Zinc</th>
                <th scope="col">Unidad Zinc</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($datosQuimicos as $datoQuimicos)
                <tr>
                
                    <th scope="row">{!! $datoQuimicos->fecha !!}</th>
                    <td scope="row">{!! $datoQuimicos->aluminio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadAluminio !!}</td>
                    <td scope="row">{!! $datoQuimicos->arsenico !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadArsenico !!}</td>
                    <td scope="row">{!! $datoQuimicos->boro !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadBoro !!}</td>
                    <td scope="row">{!! $datoQuimicos->cloro !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadCloro !!}</td>
                    <td scope="row">{!! $datoQuimicos->cadmio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadCadmio !!}</td>
                    <td scope="row">{!! $datoQuimicos->calcio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadCalcio !!}</td>
                    <td scope="row">{!! $datoQuimicos->cobre !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadCobre !!}</td>
                    <td scope="row">{!! $datoQuimicos->cromo !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadCromo !!}</td>
                    <td scope="row">{!! $datoQuimicos->hierro !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadHierro !!}</td>
                    <td scope="row">{!! $datoQuimicos->fosfato !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadFosfato !!}</td>
                    <td scope="row">{!! $datoQuimicos->magnesio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadMagnesio !!}</td>
                    <td scope="row">{!! $datoQuimicos->manganeso !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadManganeso !!}</td>
                    <td scope="row">{!! $datoQuimicos->molibdeno !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadMolibdeno !!}</td>
                    <td scope="row">{!! $datoQuimicos->nitrato !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadNitrato !!}</td>
                    <td scope="row">{!! $datoQuimicos->niquel !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadNiquel !!}</td>
                    <td scope="row">{!! $datoQuimicos->oxigeno !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadOxigeno !!}</td>
                    <td scope="row">{!! $datoQuimicos->ph !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadPh !!}</td>
                    <td scope="row">{!! $datoQuimicos->plata !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadPlata !!}</td>
                    <td scope="row">{!! $datoQuimicos->plomo !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadPlomo !!}</td>
                    <td scope="row">{!! $datoQuimicos->potasio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadPotasio !!}</td>
                    <td scope="row">{!! $datoQuimicos->selenio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadSelenio !!}</td>
                    <td scope="row">{!! $datoQuimicos->sodio !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadSodio !!}</td>
                    <td scope="row">{!! $datoQuimicos->zinc !!}</td>
                    <td scope="row">{!! $datoQuimicos->unidadZinc !!}</td>
                
                </tr>
            
            @endforeach
        </tbody>
    </table>

</html>