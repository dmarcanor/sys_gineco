<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    public function up()
    {
        if(! Schema::hasTable('consultas')) {
            Schema::create('consultas', function (Blueprint $table) {
                $table->uuid('id');
                $table->uuid('paciente_id');
                $table->string('codigo');
                $table->dateTime('fecha');
                $table->longText('observaciones')->nullable();
                $table->longText('indicaciones')->nullable();
                $table->string('motivo')->nullable();
                $table->string('reposo')->nullable();

                $table->primary('id');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        if(Schema::hasTable('consultas'))
            Schema::dropIfExists('consultas');
    }
}
