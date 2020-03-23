<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Files</title>
    </head>
    <body>
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
