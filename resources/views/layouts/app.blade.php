<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Toolbox di smal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Toolbox</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer class="mt-5 text-muted text-center">
        <p>Creato con ❤️ da smal</p>
    </footer>

@stack('scripts')
</body>

</html>

