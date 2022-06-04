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
            $table->increments('id_alloggio');
            $table->string('descrizione',255)->nullable();
            $table->smallInteger('utenze')->nullable()->unsigned();
            $table->smallInteger('canone_affitto')->unsigned();
            $table->tinyInteger('periodo_locazione')->unsigned();
            $table->char('genere',1)->default('u');
            $table->smallInteger('eta_minima')->default(18)->unsigned();
            $table->smallInteger('eta_massima')->default(100)->unsigned();
            $table->smallInteger('dimensione')->nullable()->unsigned();
            $table->tinyInteger('num_posti_letto_tot')->nullable()->unsigned();
            $table->string('via',255);
            $table->string('citta',255);
            $table->string('num_civico', 10);
            $table->char('cap',5);
            $table->smallInteger('interno')->nullable()->unsigned();
            $table->tinyInteger('piano')->nullable()->unsigned();
            $table->date('data_inserimento_offerta');
            $table->string('tipologia',12);
            $table->string('stato',9)->default('libero');
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
