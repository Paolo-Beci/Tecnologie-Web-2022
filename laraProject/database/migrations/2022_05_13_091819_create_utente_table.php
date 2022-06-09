<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('utente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username',20);
            $table->string('password');
            $table->string('ruolo',10);
            $table->integer('dati_personali')->unsigned();
            $table->foreign('dati_personali')->references('id_dati_personali')->on('dati_personali')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('utente');
    }
}
