<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Resultado Ronda 2</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Subir Resultado Ronda 2</h1>
        <form action="{{ route('subirResultadoRonda2', ['idTorneo' => $idTorneo, 'nroPartido' => $nroPartido]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="cancha" class="form-label">Cancha</label>
                <input type="text" class="form-control" id="cancha" name="cancha" required>
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>
            <div class="mb-3">
                <label for="ganador" class="form-label">Ganador</label>
                <select class="form-control" id="ganador" name="ganador" required>
                    @foreach ($jugadores as $jugador)
                        <option value="{{ $jugador['id'] }}">{{ $jugador['nombre'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="puntaje" class="form-label">Puntaje</label>
                <input type="text" class="form-control" id="puntaje" name="puntaje" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir Resultado</button>
        </form>
    </div>
</body>
</html>

