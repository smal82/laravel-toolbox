@extends('layouts.app')

@section('title', 'Convertitore Colori<')

@section('content')
<h2>Convertitore Colori</h2>
<form method="POST" action="/tool/color">
    @csrf
    <label>HEX:</label>
    <input type="text" name="hex" placeholder="#ff5733">
    <button type="submit" name="convert" value="hex">Converti in RGB</button>
</form>

<form method="POST" action="/tool/color">
    @csrf
    <label>RGB:</label>
    <input type="text" name="rgb" placeholder="255,87,51">
    <button type="submit" name="convert" value="rgb">Converti in HEX</button>
</form>

@if(isset($result))
    <p>Risultato: <strong>{{ $result }}</strong></p>
@endif
@endsection
