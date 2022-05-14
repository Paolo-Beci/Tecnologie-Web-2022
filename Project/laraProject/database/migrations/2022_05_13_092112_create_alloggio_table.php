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
            $table->string('descrzione',255)->nullable();
            $table->integer('utenze')->nullable();
            $table->integer('canone_affitto');
            $table->integer('periodo_locazione');
            $table->char('genere',1)->default('u');
            $table->integer('eta_minima')->default(18);
            $table->integer('eta_massima')->default(100);
            $table->integer('dimensione')->nullable();
            $table->integer('num_posti_letto_tot')->nullable();
            $table->string('via',255);
            $table->string('città',255);
            $table->tinyInteger('num_civico');
            $table->char('cap',5);
            $table->integer('interno')->nullable();
            $table->integer('piano')->nullable();
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
