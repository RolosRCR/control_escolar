<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materias'; // Nombre de la tabla
    protected $primaryKey = 'id_materia'; // Clave primaria
    public $timestamps = true; 

    protected $fillable = ['nombre', 'credito']; // Columnas que se pueden rellenar
}
