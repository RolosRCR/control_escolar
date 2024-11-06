<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            ['id_usuario' => 1, 'nombre' => 'Roberto C Ramirez', 'email' => 'juan.perez@example.com', 'rol' => 1, 'contrasena' => bcrypt('1234')],
            ['id_usuario' => 2, 'nombre' => 'María García', 'email' => 'maria.garcia@example.com', 'rol' => 2, 'contrasena' => bcrypt('123456')],
            ['id_usuario' => 3, 'nombre' => 'José López', 'email' => 'jose.lopez@example.com', 'rol' => 2, 'contrasena' => bcrypt('123456')],
            ['id_usuario' => 4, 'nombre' => 'Laura Martínez', 'email' => 'laura.martinez@example.com', 'rol' => 2, 'contrasena' => bcrypt('123456')],
            ['id_usuario' => 5, 'nombre' => 'Ana Fernández', 'email' => 'ana.fernandez@example.com', 'rol' => 3, 'contrasena' => bcrypt('123456')],
            ['id_usuario' => 6, 'nombre' => 'Carlos Ramírez', 'email' => 'carlos.ramirez@example.com', 'rol' => 3, 'contrasena' => bcrypt('123456')],
            ['id_usuario' => 7, 'nombre' => 'Elena Díaz', 'email' => 'elena.diaz@example.com', 'rol' => 3, 'contrasena' => bcrypt('123456')],
            ['id_usuario' => 8, 'nombre' => 'Pedro Sánchez', 'email' => 'pedro.sanchez@example.com', 'rol' => 3, 'contrasena' => bcrypt('123456')],
        ]);
    }
}
