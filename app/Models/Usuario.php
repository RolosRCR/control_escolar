<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; // Nombre de la tabla
    protected $primaryKey = 'id_usuario'; // Clave primaria personalizada
    
    // Si deseas desactivar el autoincremento en esta clave, puedes añadir:
    // public $incrementing = false;

    protected $fillable = [
        'nombre',
        'email',
        'rol',
        'contrasena'
    ];
}
