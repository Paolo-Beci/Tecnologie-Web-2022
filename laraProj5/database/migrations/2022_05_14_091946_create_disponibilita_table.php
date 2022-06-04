<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisponibilitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disponibilita', function (Blueprint $table) {
            $table->integer('alloggio')->unsigned();
            $table->string('servizio', 255);
            $table->tinyInteger('quantita')->unsigned();
            $table->primary(array('alloggio', 'servizio'));
            $table->foreign('alloggio')->references('id_alloggio')->on('alloggio')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('servizio')->references('nome_servizio')->on('servizio')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disponibilita');
    }
}
