<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostoLettoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posto_letto', function (Blueprint $table) {
            $table->increments('id_posto_letto')->primary();
            $table->integer('tipologia')->default(1);
            $table->binary('angolo_studio')->default(0);
            $table->integer('alloggio')->unsigned();
            $table->foreign('alloggio')->references('id_alloggio')->on(alloggio)->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posto_letto');
    }
}
