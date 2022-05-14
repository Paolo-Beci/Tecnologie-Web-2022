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
            $table->string('utente', 255)->references('username')->on('utente')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('faq')->references('id_faq')->on('faq')->onUpdate('cascade')->onDelete('cascade');
            $table->dateTime('data_modifica');
            $table->primary(array('utente', 'faq'));
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
