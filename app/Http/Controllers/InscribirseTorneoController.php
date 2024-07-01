<?php

namespace App\Http\Controllers;

use App\Models\InscribirseTorneo;
use App\Models\Torneo;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InscribirseTorneoController extends Controller
{
    public function listar()
    {
        $torneos = Torneo::all();
        return view('inscribirsetorneo.index', compact('torneos'));
    }

    public function show($id_torneo)
    {
        $user = Auth::user();
        $torneo = Torneo::findOrFail($id_torneo);
        
        // Verificar si el usuario ya está inscrito en el torneo
        $inscrito = InscribirseTorneo::where('id_torneo', $id_torneo)
                                    ->where('id_usuario', $user->id)
                                    ->first();

        return view('inscribirsetorneo.show', compact('torneo', 'inscrito'));
    }

    public function inscribirse(Request $request, $id_torneo)
    {
        $user = Auth::user();
        $torneo = Torneo::findOrFail($id_torneo);

        // Verificar si el usuario ya está inscrito en el torneo
        $inscrito = InscribirseTorneo::where('id_torneo', $id_torneo)
                                    ->where('id_usuario', $user->id)
                                    ->first();

        if ($inscrito) {
            return redirect()->back()->with('error', 'Ya estás inscrito en este torneo.');
        }

        // Manejar la subida de la imagen
        $imagenPago = null;
        if ($request->hasFile('imagen_pago')) {
            $imagenPago = $request->file('imagen_pago')->store('pagos', 'public');
        }

        // Crear la inscripción
        InscribirseTorneo::create([
            'id_torneo' => $torneo->id_torneo,
            'id_usuario' => $user->id,
            'nombre_usuario' => $user->name,
            'cupos_totales' => $torneo->cupos_totales,
            'cupos_disponibles' => $torneo->cupos_totales - 1,
        ]);

        // Actualizar los cupos disponibles en el torneo
        $torneo->cupos_totales -= 1;
        $torneo->save();

        // Crear la factura
        Factura::create([
            'user_id' => $user->id,
            'tipo_factura' => 3, // Tipo factura para torneo
            'monto' => $torneo->costo_inscripcion,
            'imagen_pago' => $imagenPago,
        ]);

        return redirect()->route('inscribirsetorneo.show', $id_torneo)->with('success', 'Inscripción exitosa.');
    }
}
