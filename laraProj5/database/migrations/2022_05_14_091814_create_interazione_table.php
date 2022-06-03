<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterazioneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interazione', function (Blueprint $table) {
            $table->bigInteger('utente')->unsigned();
            $table->integer('alloggio')->unsigned();
            $table->date('data_interazione');
            $table->primary(array('utente', 'alloggio'));
            $table->foreign('utente')->references('id')->on('utente')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('interazione');
    }
}
