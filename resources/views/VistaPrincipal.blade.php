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
        <title>Página principal</title>

        
    </head>
    <body>
        @include("navbar.navbar")
        
        <div class="centralText" >
            <div align="justify">
                
                    <br>
                    <div align="center">
                        <h1>Descripción general </h1>
                    </div>
                    <br>
                    El modelo de desarrollo global está contribuyendo a causar aumento en la contaminación ambiental. Hablar de contaminación ambiental corresponde a considerar agentes físicos, químicos o biológicos cuya  presencia en el ambiente puede resultar nocivos para la salud de las personas y/o repercutir negativamente en el medio ambiente. 
                    Mundialmente se focaliza la atención en los siguientes problemas ambientales: 
                    <br>
                    <br>
                    1.	Contaminación atmosférica
                    <br>
                    2.	Escasez y contaminación de recursos hídricos
                    <br>
                    3.	Degradación, pérdida y contaminación de suelos
                    <br>
                    4.	Ruidos molestos
                    <br>
                    5.	Manejo de residuos sólidos
                    <br>
                    6.	Pérdida de biodiversidad. 
                    <br>
                    <br>

                    Cambio climático y calentamiento global, sequías y disminución de reservas de agua, aumento en el consumo de agua, son problemas cotidianos en Chile y particularmente en las Regiones del Norte. 
                    Esta iniciativa consiste en un prototipo de sistema inteligente de presentación de información de la calidad del recurso hídrico de una sección del río Loa. La aplicación presentará información analizada y de forma sencilla, considerando como datos de entrada la información sensada por el Ministerio de Obras Públicas de Chile a través de la página web de la Dirección general de Aguas (www.dga.cl) de Chile.
                    <br>
                    <br>
                    La calidad del agua es de gran importancia para las personas, el ecosistema y el sector comercial-industrial. La disponibilidad de información de calidad del agua en tiempo real es conveniente para, por ejemplo: enfrentar contingencias ambientales, que por lo general se presentan de manera espontánea, sin aviso, y que generalmente requieren de respuestas inmediatas, para tranquilidad de la comunidad, las entidades públicas y sector privado.
                    <br>
                    <br>
                    Esta solución computacional es una ventana para observar/estudiar el efecto del cambio climático en recursos hídricos de la cuenca del río Loa. Permitirá consultar el estado de la calidad del agua en cualquier momento y de forma online, además que permitirá hacer predicciones de la calidad del agua ante cierta combinación (real o simulada) de elementos físico químicos presentes en el río Loa. En un futuro próximo este prototipo de sistema inteligente contendrá la información de todos los puntos de medición de la DGA en el río Loa y sus afluentes, por el momento, estamos trabajando en el desarrollo de este prototipo con 7 puntos de un segmento de río ubicado en la parte alta del Loa, antes de la ciudad de Calama.
           
            </div>
        </div>
    </body>
</html>
