<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessaggioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggio', function (Blueprint $table) {
            $table->increments('id_messaggio');
            $table->dateTime('data_invio');
            $table->mediumText('contenuto');
            $table->bigInteger('mittente')->unsigned();
            $table->bigInteger('destinatario')->unsigned();
            $table->integer('alloggio')->unsigned();
            $table->foreign('mittente')->references('id')->on('utente')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('destinatario')->references('id')->on('utente')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('alloggio')->references('id_alloggio')->on('alloggio')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messaggio');
    }
}
