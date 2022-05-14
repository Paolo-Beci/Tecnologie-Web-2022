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
            $table->increments('id_dati_personali')->primary();
            $table->integer('id_foto_profilo')->nullable();
            $table->char('cellulare',10)->nullable();
            $table->string('via',MAX);
            $table->string('città',MAX);
            $table->tinyInteger('num_civico');
            $table->char('cap',5);
            $table->string('nome',MAX);
            $table->string('cognome',MAX);
            $table->dateTime('data_nascita');
            $table->string('luogo_nascita',MAX);
            $table->char('sesso',1);
            $table->string('mail',MAX);
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
