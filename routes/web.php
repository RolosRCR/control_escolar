<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;
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
