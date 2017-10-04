<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TanahTanamanhortikultura extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanah_hortikultura', function (Blueprint $table) {
            $table->bigIncrements('thortikultura_id');
            $table->unsignedInteger('tanah_id');
            $table->string('namatanaman');
            $table->unsignedInteger('satu_tiga');
            $table->unsignedInteger('tiga_sepuluh');
            $table->unsignedInteger('lebih_sepuluh');
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
        Schema::dropIfExists('tanah_hortikultura');
    }
}
