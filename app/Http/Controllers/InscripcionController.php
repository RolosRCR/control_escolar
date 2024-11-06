<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Curso;
use App\Models\Usuario;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    public function index()
    {
        $inscripciones = Inscripcion::with(['curso', 'alumno'])->get();
        return view('inscripciones.index', compact('inscripciones'));
    }

    public function create()
    {
        $cursos = Curso::with('materia')->get();
        $alumnos = Usuario::where('rol', 3)->get();
        return view('inscripciones.new', compact('cursos', 'alumnos'));
    }

    // Ejemplo de validación en el método de almacenamiento en el controlador
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'id_curso' => 'required|exists:cursos,id_curso',
            'id_alumno' => 'required|exists:usuarios,id_usuario',
            'parcial_uno' => 'nullable|numeric',
            'parcial_dos' => 'nullable|numeric',
            'parcial_tres' => 'nullable|numeric',
            'parcial_cuatro' => 'nullable|numeric',
        ]);

        //dd(vars: $request);

        Inscripcion::create($validatedData);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción creada con éxito.');
    }



    public function edit(Inscripcion $inscripcion)
    {
        
        $cursos = Curso::all();
        $alumnos = Usuario::where('rol', 3)->get();
        // Obtener el curso actual de la inscripción
        $cursoActual = $inscripcion->curso; // Asegúrate de que 'curso' es el nombre de la relación
        return view('inscripciones.edit', compact('inscripcion', 'cursos', 'alumnos', 'cursoActual'));
    }

    public function update(Request $request, Inscripcion $inscripcion)
    {
      //  dd($inscripcion);
        $request->validate([
            'id_curso' => 'required|exists:cursos,id_curso',
            'id_alumno' => 'required|exists:usuarios,id_usuario',
            'parcial_uno' => 'nullable|integer',
            'parcial_dos' => 'nullable|integer',
            'parcial_tres' => 'nullable|integer',
            'parcial_cuatro' => 'nullable|integer',
        ]);

        $inscripcion->update($request->all());

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción actualizada exitosamente.');
    }

    public function destroy(Inscripcion $inscripcion)
    {
        $inscripcion->delete();
        return redirect()->route('inscripciones.index')->with('success', 'Inscripción eliminada exitosamente.');
    }
}
