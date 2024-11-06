<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    public function up()
{
    Schema::create('cursos', function (Blueprint $table) {
        $table->id('id_curso');
        $table->unsignedBigInteger('id_materia');
        $table->unsignedBigInteger('id_profesor');
        $table->dateTime('inicio'); 
        $table->dateTime('fin');    
        $table->timestamps();

        $table->foreign('id_materia')->references('id_materia')->on('materias')->onDelete('cascade');
        $table->foreign('id_profesor')->references('id_usuario')->on('usuarios')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
