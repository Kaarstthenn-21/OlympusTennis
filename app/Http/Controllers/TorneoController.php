<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TorneoController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }
        $torneos = Torneo::with('categoria')->get();
        return view('torneos.index', compact('torneos'));
    }

    public function create()
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }
        $categorias = Categoria::all();
        return view('torneos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required',
            'organizador' => 'required',
            'nombre_torneo' => 'required',
            'modalidad' => 'required',
            'cupos_totales' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'costo_inscripcion' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        Torneo::create($request->all());

        return redirect()->route('torneos.index')->with('success', 'Torneo creado con éxito.');
    }

    public function edit(Torneo $torneo)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }
        $categorias = Categoria::all();
        return view('torneos.edit', compact('torneo', 'categorias'));
    }

    public function update(Request $request, Torneo $torneo)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }
        $request->validate([
            'id_categoria' => 'required',
            'organizador' => 'required',
            'nombre_torneo' => 'required',
            'modalidad' => 'required',
            'cupos_totales' => 'required|integer',
            'fecha_inicio' => 'required|date',
            'costo_inscripcion' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        $torneo->update($request->all());

        return redirect()->route('torneos.index')->with('success', 'Torneo actualizado con éxito.');
    }

    public function destroy(Torneo $torneo)
    {
        if (Auth::user()->is_admin !== 1) {
            return redirect('/dashboard');
        }
        $torneo->delete();

        return redirect()->route('torneos.index')->with('success', 'Torneo eliminado con éxito.');
    }
    public function show(Torneo $torneo)
    {
        return view('torneos.show', compact('torneo'));
    }
}
