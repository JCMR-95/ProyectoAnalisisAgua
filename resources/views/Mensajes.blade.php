@if ($message = Session::get('noAptoNoApto'))
    <div class="mensajeFinal alert alert-danger alert-block">
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('bajoNoApto'))
    <div class="mensajeFinal alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('neutroNoApto'))
    <div class="mensajeFinal alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('altoNoApto'))
    <div class="mensajeFinal alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('noAptoBajo'))
    <div class="mensajeFinal alert alert-danger alert-block">
        {{ $message }}
    </div>
@endif

@if ($message = Session::get('bajoBajo'))
    <div class="mensajeFinal alert alert-warning alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('neutroBajo'))
    <div class="mensajeFinal alert alert-info alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif

@if ($message = Session::get('altoBajo'))
    <div class="mensajeFinal alert alert-success alert-block">
        <strong>{{ $message }}</strong>
    </div>
@endif