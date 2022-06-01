<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatiPersonaliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dati_personali', function (Blueprint $table) {
            $table->increments('id_dati_personali');
            $table->integer('id_foto_profilo')->nullable()->unsigned();
            $table->string('estensione_p', 4)->nullable();
            $table->char('cellulare',10)->nullable();
            $table->string('via',255);
            $table->string('citta',255);
            $table->smallInteger('num_civico');
            $table->char('cap',5);
            $table->string('nome',255);
            $table->string('cognome',255);
            $table->dateTime('data_nascita');
            $table->string('luogo_nascita',255);
            $table->char('sesso',1);
            $table->string('mail',255)->nullable();
            $table->char('codice_fiscale',16);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dati_personali');
    }
}
