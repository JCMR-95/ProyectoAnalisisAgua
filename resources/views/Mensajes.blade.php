@if ($message = Session::get('noApto'))
    <div class="mensajeFinal alert alert-danger alert-block">
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('bajo'))
    <div class="mensajeFinal alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('neutro'))
    <div class="mensajeFinal alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('alto'))
    <div class="mensajeFinal alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif