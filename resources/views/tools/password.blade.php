@extends('layouts.app')

@section('title', 'Generatore di Password Sicure')

@section('content')
<h2>Generatore di Password Sicure</h2>
<form method="POST" action="/tool/password">
    @csrf
    <label>Lunghezza:</label>
    <input type="number" name="length" value="12" min="6" max="64">
    <button type="submit">Genera</button>
</form>

@if(isset($password))
<div class="alert alert-info mt-4 d-flex justify-content-between align-items-center">
    <div>
        <p class="mb-0">Password generata: <strong id="generated-password">{{ $password }}</strong></p>
    </div>
    <button class="btn btn-sm btn-outline-secondary ms-3" onclick="copyPassword()">Copia</button>
</div>
@endif

@endsection
@push('scripts')
<textarea id="hidden-password" style="position:absolute; left:-9999px;"></textarea>

<script>
    function copyPassword() {
        const passwordText = document.getElementById('generated-password').innerText;
        const hiddenField = document.getElementById('hidden-password');
        hiddenField.value = passwordText;
        hiddenField.select();
        document.execCommand('copy');
        alert('Password copiata negli appunti!');
    }
</script>

@endpush

