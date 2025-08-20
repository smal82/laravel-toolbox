@extends('layouts.app')

@section('title', 'Generatore QR Code')

@section('content')
<h2>Generatore QR Code</h2>
<form method="POST" action="/tool/qrcode">
    @csrf
    <label>Testo o URL:</label>
    <input type="text" name="text" required>
    <button type="submit">Genera</button>
</form>

@if(isset($qr))
    <div>{!! $qr !!}</div>
@endif
@endsection
