<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifica', function (Blueprint $table) {
            $table->bigIncrements('id_modifica');
            $table->bigInteger('utente')->unsigned();
            $table->integer('faq')->unsigned();
            $table->dateTime('data_modifica');
            $table->foreign('utente')->references('id')->on('utente')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('faq')->references('id_faq')->on('faq')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modifica');
    }
}
