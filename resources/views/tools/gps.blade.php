@extends('layouts.app')

@section('title', 'Generatore Coordinate GPS')

@section('content')
<h2 class="mb-4">Generatore Coordinate GPS 📍</h2>
<form method="POST" action="{{ url('/tool/gps') }}">
    @csrf
    <button type="submit" class="btn btn-success">Genera Coordinate</button>
</form>

@if(session('coords'))
    <div class="alert alert-info mt-4">
        Latitudine: <strong>{{ session('coords')['lat'] }}</strong><br>
        Longitudine: <strong>{{ session('coords')['lon'] }}</strong>
    </div>
@endif
@endsection

