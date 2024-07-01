<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Inscripcion;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionController extends Controller
{
    public function inscribir(Request $request, Clase $clase)
    {
        $userId = Auth::id();

        // Validar si el usuario ya está inscrito en la clase
        $inscripcionExistente = Inscripcion::where('clase_id', $clase->id)
                                           ->where('user_id', $userId)
                                           ->first();

        if ($inscripcionExistente) {
            return redirect()->route('clases.show', $clase)->with('error', 'Ya estás inscrito en esta clase.');
        }

        if ($clase->cupos_disponibles <= 0) {
            return redirect()->route('clases.show', $clase)->with('error', 'No hay cupos disponibles.');
        }

        $request->validate([
            'imagen_pago' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagenPago = $request->file('imagen_pago');
        $timestamp = now()->format('YmdHis');
        $uniqueName = $timestamp . '_' . uniqid() . '.' . $imagenPago->getClientOriginalExtension();
        $imagenPagoPath = 'pagos/' . $uniqueName;
        $imagenPago->move(public_path('pagos'), $uniqueName);

        // Crear la inscripción
        Inscripcion::create([
            'clase_id' => $clase->id,
            'user_id' => $userId,
        ]);

        // Crear la factura
        Factura::create([
            'user_id' => $userId,
            'tipo_factura' => 2, // 2 para inscripciones
            'monto' => $clase->costo_inscripcion,
            'imagen_pago' => $imagenPagoPath,
        ]);

        // Reducir el número de cupos disponibles
        $clase->cupos_disponibles--;
        $clase->save();

        return redirect()->route('clases.show', $clase)->with('success', 'Inscripción realizada con éxito.');
    }

    public function show(Clase $clase)
    {
        $hayCuposDisponibles = $clase->cupos_disponibles > 0;
        return view('inscripciones.show', compact('clase', 'hayCuposDisponibles'));
    }

    public function misClases()
    {
        $user = Auth::user();
        $clases = $user->clases;

        return view('inscripciones.mis_clases', compact('clases'));
    }

    public function verPago(Inscripcion $inscripcion)
    {
        $factura = Factura::where('user_id', $inscripcion->user_id)
            ->where('tipo_factura', 2)
            ->where('monto', $inscripcion->clase->costo_inscripcion)
            ->latest()
            ->with('user') // Carga la relación user
            ->first();

        if (!$factura) {
            return redirect()->route('clases.participantes', $inscripcion->clase->id)->with('error', 'No se encontró la factura de pago.');
        }

        return view('inscripciones.ver_pago', compact('factura'));
    }
}
