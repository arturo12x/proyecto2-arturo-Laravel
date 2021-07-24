<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaProfesorMateria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profeMateria', function (Blueprint $table) {
$table->id();
$table->foreignId('idUser')->constrained('users');
$table->foreignId('idMateria')->constrained('materias');

            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profeMateria', function (Blueprint $table) {
DB::drop('profeMateria');

            //
        });
    }
}
