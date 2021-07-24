<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionCitasTable extends Migration
{

    public function up()
    {
        if(! Schema::hasTable('gestion_citas')) {
            Schema::create('gestion_citas', function (Blueprint $table) {
                $table->uuid('id');
                $table->uuid('paciente_id');
                $table->string('codigo');
                $table->dateTime('fecha');
                $table->string('estado');
                $table->string('ecografia')->nullable();

                $table->primary('id');
                $table->timestamps();
            });
        }
    }


    public function down()
    {
        if(Schema::hasTable('gestion_citas'))
            Schema::dropIfExists('gestion_citas');
    }
}
