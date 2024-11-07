<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Auth;
class UsuarioController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }
    
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'id_usuario' => 'required|integer',
            'contrasena' => 'required|string',
        ]);

        $usuario = Usuario::where('id_usuario', $request->id_usuario)->first();

        if ($usuario) {
            // Compruebo las credenciales
            if (Hash::check($request->contrasena, $usuario->contrasena)) {
                // Contraseña es correcta
                //Auth::login($usuario);
                session(['rol' => $usuario->rol]);

                // Imprimir en consola
                error_log('Rol del usuario: ' . $usuario->rol);
                //sleep(10);
                if(session('rol') == 1){return redirect('/usuarios');}
                else{return redirect('/libros');}
                
            } else {
                // Contraseña incorrecta
                return redirect('/login')->withErrors(['mensajeError' => 'Contraseña incorrecta.']);
            }
        } else {
            // Usuario no encontrado
            return redirect('/login')->withErrors(['mensajeError' => 'Usuario no encontrado.']);
        }
    }
    
    
    
    
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }





    public function create()
    {
        return view('usuarios.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'rol' => 'required',
            'contrasena' => 'required|min:4',
        ]);

        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'rol' => $request->rol,
            'contrasena' => bcrypt($request->contrasena),
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id_usuario . ',id_usuario',
            'rol' => 'required',
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'rol' => $request->rol,
            'contrasena' => $request->contrasena ? bcrypt($request->contrasena) : $usuario->contrasena,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
