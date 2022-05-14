<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlloggioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alloggio', function (Blueprint $table) {
            $table->increments('id_alloggio')->primary();
            $table->string('descrizione',255)->nullable();
            $table->smallInteger('utenze')->nullable();
            $table->smallInteger('canone_affitto');
            $table->tinyInteger('periodo_locazione');
            $table->char('genere',1)->default('u');
            $table->smallInteger('eta_minima')->default(18);
            $table->smallInteger('eta_massima')->default(100);
            $table->smallInteger('dimensione')->nullable();
            $table->tinyInteger('num_posti_letto_tot')->nullable();
            $table->string('via',255);
            $table->string('citta',255);
            $table->smallInteger('num_civico');
            $table->char('cap',5);
            $table->smallInteger('interno')->nullable();
            $table->tinyInteger('piano')->nullable();
            $table->dateTime('data_inserimento_offerta');
            $table->string('tipologia',12);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alloggio');
    }
}
