<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TanahLainnya extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanah_lainnya', function (Blueprint $table) {
            $table->bigIncrements('tlain_id');
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
        Schema::dropIfExists('tanah_lainnya');
    }
}
