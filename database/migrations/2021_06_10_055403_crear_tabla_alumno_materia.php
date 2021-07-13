<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaAlumnoMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnoMateria', function (Blueprint $table) {
            //
            $table->id();
            $table->foreignId('idAlumno')->constrained('users');
            $table->foreignId('idSemestre')->constrained('materias');
            $table->string('letra');
            $table->float('calif');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnoMateria', function (Blueprint $table) {
            //
            Schema::drop('alumnoMateria');
        });
    }
}
