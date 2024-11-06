<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('id_inscripcion');
            $table->unsignedBigInteger('id_curso');
            $table->unsignedBigInteger('id_alumno');
            $table->integer('parcial_uno')->nullable();
            $table->integer('parcial_dos')->nullable();
            $table->integer('parcial_tres')->nullable();
            $table->integer('parcial_cuatro')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_curso')->references('id_curso')->on('cursos')->onDelete('cascade');
            $table->foreign('id_alumno')->references('id_usuario')->on('usuarios')->where('rol', 3)->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}

