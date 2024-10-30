<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsuarioTable extends Migration
{
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->string('foto')->nullable()->default(null)->change(); // Permitir nulos
        });
    }

    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->string('foto')->nullable(false)->default('')->change(); // Cambiar a no nulo si es necesario
        });
    }
}
