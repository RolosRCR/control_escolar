<?php


namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Materia;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CursoController extends Controller
{

    public function index()
    {
        $rol = session('rol');

        if ($rol == 1) {
            $cursos = Curso::with(['materia', 'profesor'])->get();
    
        } elseif ($rol == 2) {
            $cursos = Curso::with(['materia', 'profesor'])
                ->where('Id_profesor', session('id'))
                ->get();
        }
    
        return view('cursos.index', compact('cursos'));

    }


    public function create()
    {
        $materias = Materia::all();
        $profesores = Usuario::where('rol', 2)->get();
        return view('cursos.new', compact('materias', 'profesores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_materia' => 'required|exists:materias,id_materia',
            'id_profesor' => 'required|exists:usuarios,id_usuario',
            'inicio' => 'required|date_format:H:i',
            'fin' => 'required|date_format:H:i|after:inicio',
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    public function edit(Curso $curso)
    {
        $materias = Materia::all();
        $profesores = Usuario::where('rol', 2)->get();
        return view('cursos.edit', compact('curso', 'materias', 'profesores'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'id_materia' => 'required|exists:materias,id_materia',
            'id_profesor' => 'required|exists:usuarios,id_usuario',
            'inicio' => 'required|date_format:H:i',
            'fin' => 'required|date_format:H:i|after:inicio',
        ]);
        //dd($request->all());
        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
