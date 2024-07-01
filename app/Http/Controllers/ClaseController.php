<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Factura;

class ClaseController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $clases = Clase::with('categoria')->get();
        return view('clases.index', compact('clases'));
    }

    public function create()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $categorias = Categoria::all();
        return view('clases.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $validated = $request->validate([
            'id_categoria' => 'required|exists:categorias,id_categoria',
            'instructor' => 'required|string|max:255',
            'cupos_totales' => 'required|integer',
            'duracion' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'costo_inscripcion' => 'required|numeric',
            'informacion' => 'required|string',
        ]);

        Clase::create($validated);
        return redirect()->route('clases.index')->with('success', 'Clase creada exitosamente.');
    }

    public function show(Clase $clase)
    {
        return view('clases.show', compact('clase'));
    }

    public function edit(Clase $clase)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $categorias = Categoria::all();
        return view('clases.edit', compact('clase', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        // Encuentra la clase por su ID
        $clase = Clase::findOrFail($id);

        // Actualiza los datos de la clase directamente
        $clase->id_categoria = $request->id_categoria;
        $clase->instructor = $request->instructor;
        $clase->cupos_totales = $request->cupos_totales;
        $clase->duracion = $request->duracion;
        $clase->fecha_inicio = $request->fecha_inicio;
        $clase->hora_inicio = $request->hora_inicio;
        $clase->hora_fin = $request->hora_fin;
        $clase->costo_inscripcion = $request->costo_inscripcion;
        $clase->informacion = $request->informacion;

        // Guarda los cambios en la base de datos
        $clase->save();

        // Redirige a la lista de clases con un mensaje de éxito
        return redirect()->route('clases.index')->with('success', 'Clase actualizada correctamente.');
    }

    public function destroy(Clase $clase)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $clase->delete();
        return redirect()->route('clases.index')->with('success', 'Clase eliminada exitosamente.');
    }

    public function listarClases()
    {
        $clases = Clase::with('categoria')->get();
        return view('clases.list', compact('clases'));
    }

    public function AdminlistarClases()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $clases = Clase::with('categoria')->get();
        return view('clases.adminlist', compact('clases'));
    }

    public function participantes(Clase $clase)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }

        $inscripciones = $clase->inscripciones()->with('user')->get();
        foreach ($inscripciones as $inscripcion) {
            $inscripcion->factura = Factura::where('user_id', $inscripcion->user_id)
                ->where('tipo_factura', 2) 
                ->where('monto', $clase->costo_inscripcion)
                ->latest()
                ->first();
        }

        return view('clases.participantes', compact('clase', 'inscripciones'));
    }
}
