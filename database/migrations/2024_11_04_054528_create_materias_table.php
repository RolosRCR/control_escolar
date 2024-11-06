<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->bigIncrements('id_materia');
            $table->string('nombre', 100);
            $table->integer('credito');
            $table->timestamps();
        });
    }
    

 
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
