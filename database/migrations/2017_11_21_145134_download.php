<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Download extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('download', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_dokumen');
            $table->date('tanggal');
            $table->string('upload',200);
            $table->integer('hits')->unsigned();
            $table->enum('kategori',array('UU','PP','PerPU','Perpres/Keppres','Permen/Kepmen','Perda/Pergub/Perbup/Perwako','Buku Pedoman', 'SNI'))->default('UU');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('download');
    }
}
