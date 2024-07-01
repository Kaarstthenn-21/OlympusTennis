<!-- resources/views/asignar-ronda1.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Ronda 1</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Asignar Ronda 1</h1>
        <form action="{{ route('asignarRonda1', ['idTorneo' => $idTorneo]) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Asignar Ronda 1</button>
        </form>
    </div>
</body>
</html>
