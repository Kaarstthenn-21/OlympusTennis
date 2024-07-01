<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos Ronda 1, 2 y 3</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Partidos Ronda 1</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Partido</th>
                    <th>Jugador 1</th>
                    <th>Jugador 2</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidosRonda1 as $nroPartido => $grupoPartidos)
                    @php
                        $jugador1 = $grupoPartidos->first()->nombre_jugador1;
                        $jugador2 = $grupoPartidos->count() > 1 ? $grupoPartidos->get(1)->nombre_jugador1 : 'Pendiente';
                    @endphp
                    <tr>
                        <td>Partido {{ $nroPartido }}</td>
                        <td>{{ $jugador1 }}</td>
                        <td>{{ $jugador2 }}</td>
                        <td>
                            <a href="{{ route('mostrarSubirResultadoRonda2', ['idTorneo' => $grupoPartidos->first()->id_torneo, 'nroPartido' => $nroPartido]) }}" class="btn btn-primary">Subir Resultado Ronda 1</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Partidos Ronda 2</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Partido</th>
                    <th>Jugador 1</th>
                    <th>Jugador 2</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidosRonda2 as $grupoPartidos)
                    @php
                        $partido = $grupoPartidos->first();
                        $nroPartido = $partido->nro_partido;
                        $jugador1 = $partido->nombre_jugador1;
                        $jugador2 = $grupoPartidos->count() > 1 ? $grupoPartidos->get(1)->nombre_jugador1 : 'Pendiente';
                    @endphp
                    <tr>
                        <td>Partido {{ $nroPartido }}</td>
                        <td>{{ $jugador1 }}</td>
                        <td>{{ $jugador2 }}</td>
                        <td>
                            <a href="{{ route('mostrarSubirResultadoRonda3', ['idTorneo' => $partido->id_torneo, 'nroPartido' => $nroPartido]) }}" class="btn btn-primary">Subir Resultado Ronda 2</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h1>Partidos Ronda 3</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Partido</th>
                    <th>Jugador 1</th>
                    <th>Jugador 2</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partidosRonda3 as $grupoPartidos)
                    @php
                        $partido = $grupoPartidos->first();
                        $nroPartido = $partido->nro_partido;
                        $jugador1 = $partido->nombre_jugador1;
                        $jugador2 = $grupoPartidos->count() > 1 ? $grupoPartidos->get(1)->nombre_jugador1 : 'Pendiente';
                    @endphp
                    <tr>
                        <td>Partido {{ $nroPartido }}</td>
                        <td>{{ $jugador1 }}</td>
                        <td>{{ $jugador2 }}</td>
                        <td>
                            <a href="{{ route('mostrarSubirResultadoRonda3', ['idTorneo' => $partido->id_torneo, 'nroPartido' => $nroPartido]) }}" class="btn btn-primary">Subir Resultado Ronda 3</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


