<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios'; 
    protected $primaryKey = 'id_usuario'; 

    protected $fillable = [
        'nombre',
        'email',
        'rol',
        'contrasena'
    ];
}
