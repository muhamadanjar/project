<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TanahTanamanhias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanah_hias', function (Blueprint $table) {
            $table->bigIncrements('thias_id');
            $table->unsignedInteger('tanah_id');
            $table->string('namatanaman');
            $table->unsignedInteger('batang');
            $table->string('foto',200);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanah_hias');
    }
}
