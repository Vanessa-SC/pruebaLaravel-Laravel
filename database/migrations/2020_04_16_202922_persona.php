<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Persona extends Migration
{
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->bigIncrements('idPersona');
            $table->string('nombre');
            $table->string('edad');
        });
    }

    public function down()
    {
        Schema::dropIfExists('persona');
    }
}

