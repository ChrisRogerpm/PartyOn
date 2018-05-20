<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_evento');
            $table->mediumText('descripcion_evento');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('categoria_id');
            $table->date('fecha_inicio_evento');
            $table->time('hora_evento');
            $table->mediumText('direccion_evento');
            $table->mediumText('imagen');
            $table->boolean('estado_evento');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
