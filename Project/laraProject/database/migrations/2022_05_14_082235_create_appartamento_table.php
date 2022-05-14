<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppartamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartamento', function (Blueprint $table) {
            $table->increments('id_appartamento')->primary();
            $table->tinyInteger('num_camere' )->nullable();
            $table->integer('alloggio' )->nullable()->unsigned();
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
        Schema::dropIfExists('appartamento');
    }
}
