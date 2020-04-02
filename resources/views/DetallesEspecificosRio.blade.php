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
        <thead class="thead-dark">
            <tr>
            
                <th scope="col">Fecha</th>
                <th scope="col">Elemento 1</th>
                <th scope="col">Unidad Elemento 1</th>
                <th scope="col">Elemento 2</th>
                <th scope="col">Unidad Elemento 2</th>
                <th scope="col">Elemento 3</th>
                <th scope="col">Unidad Elemento 3</th>
                <th scope="col">Elemento 4</th>
                <th scope="col">Unidad Elemento 4</th>
                <th scope="col">Elemento 5</th>
                <th scope="col">Unidad Elemento 5</th>
                <th scope="col">Elemento 6</th>
                <th scope="col">Unidad Elemento 6</th>
                <th scope="col">Elemento 7</th>
                <th scope="col">Unidad Elemento 7</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach($datosQuimicos as $datoQuimicos)
                <tr>
                
                    <th scope="row">{!! $datoQuimicos->fecha !!}</th>
                 
                
                </tr>
            
            @endforeach
        </tbody>
    </table>

</html>