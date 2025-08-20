@extends('layouts.app')

@section('title', 'Hash Generator')

@section('content')
<h2 class="mb-4">Hash Generator 🔐</h2>
<form method="POST" action="{{ url('/tool/hash') }}">
    @csrf
    <div class="mb-3">
        <label>Testo da convertire:</label>
        <input type="text" name="testo" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Algoritmo:</label>
        <select name="algoritmo" class="form-control">
            <option value="md5">MD5</option>
            <option value="sha1">SHA1</option>
            <option value="sha256">SHA256</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Genera Hash</button>
</form>

@if(session('hash'))
    <div class="alert alert-info mt-4">
        Hash: <strong>{{ session('hash') }}</strong>
    </div>
@endif
@endsection

