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
            $table->bigIncrements('id_alloggio')->index();
            $table->varchar('descrzione',MAX)->nullable();
            $table->integer('utenze')->nullable();
            $table->integer('canone_affitto')->nullable();
            $table->integer('periodo_locazione');
            $table->char('genere',1)->default('u');
            $table->integer('eta_minima')->default(18);
            $table->integer('eta_massima')->default(100);
            $table->integer('dimensione');
            $table->integer('num_posti_letto_tot')->nullable();
            $table->varchar('via',MAX);
            $table->varchar('città',MAX);
            $table->tinyInteger('num_civico');
            $table->char('cap',5);
            $table->integer('interno')->nullable();
            $table->integer('piano')->nullable();
            $table->dateTime('data_inserimento_offerta');
            $table->varchar('tipologia',12);
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
