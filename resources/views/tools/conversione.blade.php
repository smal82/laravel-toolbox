@extends('layouts.app')

@section('title', 'Convertitore Unità di Misura')

@section('content')
<h2 class="mb-4">Convertitore Unità di Misura 🔄</h2>
<form method="POST" action="{{ url('/tool/conversione') }}">
    @csrf
    <div class="mb-3">
        <label>Valore:</label>
        <input type="number" step="any" name="valore" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tipo:</label>
        <select name="tipo" class="form-control">
            <option value="kg-lb">Kg → Libbre</option>
            <option value="lb-kg">Libbre → Kg</option>
            <option value="cm-inch">Cm → Pollici</option>
            <option value="inch-cm">Pollici → Cm</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Converti</button>
</form>

@if(session('risultato'))
    <div class="alert alert-info mt-4">
        Risultato: <strong>{{ session('risultato') }}</strong>
    </div>
@endif
@endsection

