<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('materias')->insert([
            ['id_materia' => 100001, 'nombre' => 'Algoritmos', 'credito' => 8],
            ['id_materia' => 100002, 'nombre' => 'Estructuras de Datos', 'credito' => 6],
            ['id_materia' => 100003, 'nombre' => 'Inteligencia Artificial', 'credito' => 8],
            ['id_materia' => 100004, 'nombre' => 'Sistemas Operativos', 'credito' => 6],
            ['id_materia' => 100005, 'nombre' => 'Redes de Computadoras', 'credito' => 4],
        ]);
    }

}
