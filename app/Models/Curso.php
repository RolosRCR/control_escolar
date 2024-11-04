<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $primaryKey = 'id_curso';

    // Si tu clave primaria no es un entero, cámbialo a true
    public $incrementing = false; // Cambia esto a false si 'id_curso' es un string (ej. UUID)

    // Si no usas timestamps, puedes agregar esto
    public $timestamps = false; // Cambia a true si estás usando created_at y updated_at

    // Campos que son asignables en masa
    protected $fillable = [
        'id_curso',   // Incluye la clave primaria si es necesaria
        'id_materia',
        'id_profesor', // Aquí se refiere a 'id' de la tabla usuarios
        'inicio',
        'fin',
    ];

    // Definir la relación con el modelo Materia
    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    // Definir la relación con el modelo Usuario (en este caso como Profesor)
    public function profesor()
    {
        return $this->belongsTo(Usuario::class, 'id_profesor')->where('rol', 2);
    }
}
