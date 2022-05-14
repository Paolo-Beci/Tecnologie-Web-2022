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
            Schema::create('disponibilita', function (Blueprint $table) {
                $table->integer('alloggio')->unsigned()->references('id_alloggio')->on('alloggio')->onUpdate('cascade')->onDelete('cascade');
                $table->string('servizio', 255)->references('nome_servizio')->on('servizio')->onUpdate('cascade')->onDelete('cascade');
                $table->tinyInteger('quantita');
                $table->primary(array('alloggio', 'servizio'));
            });
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
