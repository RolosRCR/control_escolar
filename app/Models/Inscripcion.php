<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    protected $table = 'inscripciones';
    protected $primaryKey = 'id_inscripcion';
    public $timestamps = true;

    protected $fillable = [
        'id_curso',
        'id_alumno',
        'estado',
        'parcial_uno',
        'parcial_dos',
        'parcial_tres',
        'parcial_cuatro',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
    

    public function alumno()
    {
        return $this->belongsTo(Usuario::class, 'id_alumno')->where('rol', 3);
    }


}
