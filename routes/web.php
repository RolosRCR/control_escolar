<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\InscripcionController;

use App\Models\Materia;

Route::get('/', function () {
    // Obtener todas las materias
    $materias = Materia::all(); // Cambia según tu lógica

    // Pasar la variable a la vista
    return view('materias', compact('materias'));
});


// Route::get('/', function () {
//     return view('materias\index'); // Cambia 'materias' por el nombre de tu vista
// });



Route::resource('materias', MateriaController::class);
Route::post('/materias', [MateriaController::class, 'store'])->name('materias.store');

Route::resource('usuarios', UsuarioController::class);



Route::resource('cursos', CursoController::class);






Route::get('/inscripciones', [InscripcionController::class, 'index'])->name('inscripciones.index');
Route::get('/inscripciones/create', [InscripcionController::class, 'create'])->name('inscripciones.create');
Route::post('/inscripciones', [InscripcionController::class, 'store'])->name('inscripciones.store');
Route::get('/inscripciones/{inscripcion}/edit', [InscripcionController::class, 'edit'])->name('inscripciones.edit');
Route::put('/inscripciones/{inscripcion}', [InscripcionController::class, 'update'])->name('inscripciones.update');
Route::delete('/inscripciones/{inscripcion}', [InscripcionController::class, 'destroy'])->name('inscripciones.destroy');
