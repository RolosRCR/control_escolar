<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    // Mostrar la lista de materias
    public function index()
    {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));
    }
    public function create()
    {
        return view('materias.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_materia' => 'required|integer|digits:6|unique:materias,id_materia',
            'nombre' => 'required|string|max:100',
            'credito' => 'required|integer|min:2|max:8',
        ]);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia agregada exitosamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.edit', compact('materia'));
    }

    // Actualizar la materia
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'credito' => 'required|integer|min:2|max:8',
        ]);

        $materia = Materia::findOrFail($id);
        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente.');
    }

    // Eliminar una materia
    public function destroy($id)
    {
        Materia::destroy($id);
        return redirect()->route('materias.index')->with('success', 'Materia eliminada exitosamente.');
    }
}