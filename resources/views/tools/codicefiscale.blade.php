@extends('layouts.app')

@section('title', 'Calcolatore Codice Fiscale')

@section('content')
<h2 class="mb-4">Calcolatore Codice Fiscale 🇮🇹</h2>
<form method="POST" action="{{ url('/tool/codicefiscale') }}">
    @csrf
    <div class="mb-3">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Cognome:</label>
        <input type="text" name="cognome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data di nascita:</label>
        <input type="date" name="data" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Sesso:</label>
        <select name="sesso" class="form-control" required>
            <option value="M">Maschio</option>
            <option value="F">Femmina</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Comune di nascita:</label>
        <input type="text" name="comune" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Calcola</button>
</form>

@if(session('cf'))
    <div class="alert alert-success mt-4">
        Codice Fiscale: <strong>{{ session('cf') }}</strong>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mt-4">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

