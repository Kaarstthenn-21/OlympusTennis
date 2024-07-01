<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\InscribirseTorneo;
use Illuminate\Http\Request;

class PartidoController extends Controller
{
    public function ejecutarRonda1($idTorneo)
    {
        $participantes = InscribirseTorneo::where('id_torneo', $idTorneo)->get();
        $numParticipantes = $participantes->count();
    
        $partidos = [];
        $numPartidos = 8;
        $partidosPorRonda = array_fill(0, $numPartidos, 0);
    
        $numPartidosVacios = 16 - intval(($numParticipantes + 1) / 2) * 2;
    
        for ($i = 0; $i < $numParticipantes; $i++) {
            do {
                $nroPartido = rand(1, intval(($numParticipantes + 1) / 2));
            } while ($partidosPorRonda[$nroPartido - 1] >= 2);
    
            $partidosPorRonda[$nroPartido - 1]++;
    
            $partidos[] = [
                'id_torneo' => $idTorneo,
                'ronda' => 1,
                'nro_partido' => $nroPartido,
                'jugador1' => $participantes[$i]->id_inscripciontorneo,
                'nombre_jugador1' => $participantes[$i]->nombre_usuario,
                'jugador2' => null,
                'nombre_jugador2' => '',
                'cancha' => null,
                'fecha' => null,
                'ganador' => null,
                'puntaje' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    
        $numeroPartido = $numPartidos;
        while ($numPartidosVacios > 0) {
            $partidos[] = [
                'id_torneo' => $idTorneo,
                'ronda' => 1,
                'nro_partido' => $numeroPartido,
                'jugador1' => null,
                'nombre_jugador1' => '',
                'jugador2' => null,
                'nombre_jugador2' => '',
                'cancha' => null,
                'fecha' => null,
                'ganador' => null,
                'puntaje' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            $numPartidosVacios--;
            if ($numPartidosVacios > 0) {
                $partidos[] = [
                    'id_torneo' => $idTorneo,
                    'ronda' => 1,
                    'nro_partido' => $numeroPartido,
                    'jugador1' => null,
                    'nombre_jugador1' => '',
                    'jugador2' => null,
                    'nombre_jugador2' => '',
                    'cancha' => null,
                    'fecha' => null,
                    'ganador' => null,
                    'puntaje' => null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $numPartidosVacios--;
            }
            $numeroPartido--;
        }
    
        Partido::insert($partidos);
    
        return response()->json(['message' => 'Ronda 1 generada exitosamente.'], 200);
    }
    

    public function mostrarVistaRonda1($idTorneo)
    {
        return view('asignar-ronda1', ['idTorneo' => $idTorneo]);
    }

    public function listarPartidos($idTorneo)
    {
        $partidosRonda1 = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', 1)
            ->orderBy('nro_partido')
            ->get()
            ->groupBy('nro_partido');

        $partidosRonda2 = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', 2)
            ->orderBy('nro_partido')
            ->get()
            ->chunk(2);

        $partidosRonda3 = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', 3)
            ->orderBy('nro_partido')
            ->get()
            ->chunk(2);

        return view('listar-partidos', compact('partidosRonda1', 'partidosRonda2', 'partidosRonda3'));
    }

    public function mostrarSubirResultadoRonda2($idTorneo, $nroPartido)
    {
        $partidos = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', 1)
            ->where('nro_partido', $nroPartido)
            ->get();

        $jugadores = [];

        foreach ($partidos as $partido) {
            if ($partido->jugador1) {
                $jugador1 = InscribirseTorneo::find($partido->jugador1);
                if ($jugador1) {
                    $jugadores[] = [
                        'id' => $jugador1->id_inscripciontorneo,
                        'nombre' => $jugador1->nombre_usuario,
                    ];
                }
            }
            if ($partido->jugador2) {
                $jugador2 = InscribirseTorneo::find($partido->jugador2);
                if ($jugador2) {
                    $jugadores[] = [
                        'id' => $jugador2->id_inscripciontorneo,
                        'nombre' => $jugador2->nombre_usuario,
                    ];
                }
            }
        }

        return view('subir-resultado-ronda2', compact('jugadores', 'nroPartido', 'idTorneo'));
    }

    public function subirResultadoRonda2(Request $request, $idTorneo, $nroPartido)
    {
        $validated = $request->validate([
            'cancha' => 'required|string',
            'fecha' => 'required|date',
            'ganador' => 'required|exists:inscribirse_torneo,id_inscripciontorneo',
            'puntaje' => 'required|string',
        ]);
    
        $partidosRonda1 = Partido::where('id_torneo', $idTorneo)
            ->where('nro_partido', $nroPartido)
            ->where('ronda', 1)
            ->get();
    
        if ($partidosRonda1->count() > 0) {
            $ganador = null;
            $perdedor = null;
    
            foreach ($partidosRonda1 as $partido) {
                if ($partido->jugador1 && $partido->jugador1 == $request->ganador) {
                    $ganador = InscribirseTorneo::find($partido->jugador1);
                    $perdedor = InscribirseTorneo::find($partido->jugador2);
                } elseif ($partido->jugador2 && $partido->jugador2 == $request->ganador) {
                    $ganador = InscribirseTorneo::find($partido->jugador2);
                    $perdedor = InscribirseTorneo::find($partido->jugador1);
                }
            }
    
            if (!$ganador) {
                return redirect()->route('listarPartidos', $idTorneo)->with('error', 'No se encontró el ganador.');
            }
    
            $nuevoPartido = Partido::create([
                'id_torneo' => $idTorneo,
                'ronda' => 2,
                'nro_partido' => ceil($nroPartido / 2),
                'jugador1' => $ganador ? $ganador->id_inscripciontorneo : null,
                'nombre_jugador1' => $ganador ? $ganador->nombre_usuario : '',
                'jugador2' => $perdedor ? $perdedor->id_inscripciontorneo : null,
                'nombre_jugador2' => $perdedor ? $perdedor->nombre_usuario : '',
                'cancha' => $validated['cancha'],
                'fecha' => $validated['fecha'],
                'ganador' => $validated['ganador'],
                'puntaje' => $validated['puntaje'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            return redirect()->route('listarPartidos', $idTorneo)->with('success', 'Resultado de la ronda 2 subido exitosamente.');
        }
    
        return redirect()->route('listarPartidos', $idTorneo)->with('error', 'Error al subir el resultado de la ronda 2.');
    }
    

    public function mostrarSubirResultadoRonda3($idTorneo, $nroPartido)
    {
        $partidos = Partido::where('id_torneo', $idTorneo)
            ->where('ronda', 2)
            ->get();

        $jugadores = [];

        foreach ($partidos as $partido) {
            if ($partido->ganador) {
                $jugador = InscribirseTorneo::find($partido->ganador);
                if ($jugador) {
                    $jugadores[] = [
                        'id' => $jugador->id_inscripciontorneo,
                        'nombre' => $jugador->nombre_usuario,
                    ];
                }
            }
        }

        return view('subir-resultado-ronda3', compact('jugadores', 'nroPartido', 'idTorneo'));
    }

    public function subirResultadoRonda3(Request $request, $idTorneo, $nroPartido)
    {
        $validated = $request->validate([
            'cancha' => 'required|string',
            'fecha' => 'required|date',
            'ganador' => 'required|exists:inscribirse_torneo,id_inscripciontorneo',
            'puntaje' => 'required|string',
        ]);

        $partidosRonda2 = Partido::where('id_torneo', $idTorneo)
            ->where('nro_partido', $nroPartido)
            ->where('ronda', 2)
            ->get();

        if ($partidosRonda2->count() > 0) {
            $ganador1 = null;
            $ganador2 = null;

            foreach ($partidosRonda2 as $partido) {
                if ($partido->jugador1) {
                    $ganador1 = InscribirseTorneo::find($partido->jugador1);
                }
                if ($partido->jugador2) {
                    $ganador2 = InscribirseTorneo::find($partido->jugador2);
                }
            }

            $nuevoPartido = Partido::create([
                'id_torneo' => $idTorneo,
                'ronda' => 3,
                'nro_partido' => ceil($nroPartido / 2),
                'jugador1' => $ganador1 ? $ganador1->id_inscripciontorneo : null,
                'nombre_jugador1' => $ganador1 ? $ganador1->nombre_usuario : '',
                'jugador2' => $ganador2 ? $ganador2->id_inscripciontorneo : null,
                'nombre_jugador2' => $ganador2 ? $ganador2->nombre_usuario : '',
                'cancha' => $validated['cancha'],
                'fecha' => $validated['fecha'],
                'ganador' => $validated['ganador'],
                'puntaje' => $validated['puntaje'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('listarPartidos', $idTorneo)->with('success', 'Resultado de la ronda 3 subido exitosamente.');
        }

        return redirect()->route('listarPartidos', $idTorneo)->with('error', 'Error al subir el resultado de la ronda 3.');
    }
}
