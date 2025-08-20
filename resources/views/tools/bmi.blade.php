@extends('layouts.app')

@section('title', 'Calcolatore BMI')

@section('content')
<h1 class="mb-4 text-center">Calcolatore BMI</h1>
    <form method="POST" action="{{ url('/tool/bmi') }}">
        @csrf
        <div class="mb-3">
            <label for="weight" class="form-label">Peso (kg):</label>
            <input type="number" name="weight" id="weight" class="form-control" required value="{{ old('weight') }}">
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Altezza (cm):</label>
            <input type="number" name="height" id="height" class="form-control" required value="{{ old('height') }}">
        </div>
        <button type="submit" class="btn btn-primary">Calcola BMI</button>
    </form>

    @if(session('bmi'))
    <div class="alert alert-info mt-4">
        Il tuo BMI è: <strong>{{ session('bmi') }}</strong><br>
        Categoria: <strong>{{ session('category') }}</strong>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-4">
        {{ session('error') }}
    </div>
@endif

@endsection
