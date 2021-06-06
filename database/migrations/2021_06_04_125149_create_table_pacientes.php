<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('pacientes')){
            Schema::create('pacientes', function (Blueprint $table) {
                $table->uuid('id');
                $table->string('nombre');
                $table->string('apellido');
                $table->string('lugar_nacimiento');
                $table->string('grado_instruccion');
                $table->integer('edad');
                $table->dateTime('fecha_nacimiento');
                $table->string('estado_civil');
                $table->string('observacion');
                $table->string('telefono');
                $table->string('dirrecion');

                $table->primary('id');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasTable('pacientes'))
            Schema::dropIfExists('table_pacientes');
    }
}
