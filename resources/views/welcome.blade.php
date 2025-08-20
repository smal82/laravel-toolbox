<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Toolbox di smal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Toolbox</a>
        </div>
    </nav>

    <div class="container text-center">
        <h1 class="mb-4">Benvenuto nella Toolbox di smal 🧰</h1>
        <p class="lead">Scegli uno strumento da utilizzare:</p>
        
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Generatore di password</h5>
                        <p class="card-text">Genera una passowrd in modo casuale:</p>
                        <a href="{{ url('/tool/password') }}" class="btn btn-outline-primary">Vai al tool</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Calcolatore BMI</h5>
                        <p class="card-text">Calcola il tuo indice di massa corporea.</p>
                        <a href="{{ url('/tool/bmi') }}" class="btn btn-outline-primary">Vai al tool</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Convertitore Colori</h5>
                        <p class="card-text">Converti tra HEX e RGB facilmente.</p>
                        <a href="{{ url('/tool/color') }}" class="btn btn-outline-primary">Vai al tool</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Generatore QR Code</h5>
                        <p class="card-text">Crea un QR Code da testo o URL.</p>
                        <a href="{{ url('/tool/qrcode') }}" class="btn btn-outline-primary">Vai al tool</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 mb-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Calcolatore Codice Fiscale</h5>
            <p class="card-text">Genera il codice fiscale italiano da nome, data e luogo di nascita.</p>
            <a href="{{ url('/tool/codicefiscale') }}" class="btn btn-outline-primary">Vai al tool</a>
        </div>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Convertitore Unità di Misura</h5>
            <p class="card-text">Converti tra kg/libbre, cm/pollici e altre unità comuni.</p>
            <a href="{{ url('/tool/conversione') }}" class="btn btn-outline-primary">Vai al tool</a>
        </div>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Hash Generator</h5>
            <p class="card-text">Genera hash MD5, SHA1 o SHA256 da qualsiasi testo.</p>
            <a href="{{ url('/tool/hash') }}" class="btn btn-outline-primary">Vai al tool</a>
        </div>
    </div>
</div>
<div class="col-md-4 mb-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Generatore Coordinate GPS</h5>
            <p class="card-text">Crea coordinate GPS casuali per test e simulazioni.</p>
            <a href="{{ url('/tool/gps') }}" class="btn btn-outline-primary">Vai al tool</a>
        </div>
    </div>
</div>

        </div>

        <footer class="mt-5 text-muted">
            <p>Creato con ❤️ da smal</p>
        </footer>
    </div>

</body>
</html>

