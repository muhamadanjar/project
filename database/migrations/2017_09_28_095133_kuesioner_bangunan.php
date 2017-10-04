<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KuesionerBangunan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuesioner_bangunan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_responden')->nullable();
            $table->bigInteger('kode_prov')->nullable();
            $table->bigInteger('kode_kab')->nullable();
            $table->bigInteger('kode_kec')->nullable();
            $table->bigInteger('kode_kel')->nullable();
            $table->string('jorong')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->integer('id_user')->nullable();

            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin',1)->nullable();
            $table->string('usia')->nullable();
            $table->string('pendidikanterakhir')->nullable();
            $table->string('statusrumahtangga')->nullable();
            $table->string('lamatinggal')->nullable();
            
            $table->string('jumlahorang')->nullable();
            $table->string('jumlahkk')->nullable();
            $table->string('statuskependudukan')->nullable();
            $table->string('kepemilikanktp')->nullable();
            $table->string('kepemilikankk')->nullable();

            $table->string('statuskepemilikantanah')->nullable();
            $table->string('statuskepemilikanrumah')->nullable();
            $table->string('namapemilik')->nullable();
            $table->text('alamatpemilik')->nullable();
            $table->string('hargasewaperbulan')->nullable();
            $table->string('jeniskontruksi')->nullable();
            $table->string('strukpbb')->nullable();
            $table->float('luasbumi')->nullable();
            $table->float('luasbangunan')->nullable();
            $table->string('kepemilikansuratimb')->nullable();
            
            $table->string('pemanfaatanbangunan')->nullable();
            $table->string('sumberpenerangan')->nullable();
            $table->string('sambungantelpkabel')->nullable();
            $table->string('jenispagarrumah')->nullable();
            $table->integer('panjangpagar')->nullable();
            $table->string('kepemilikansumurmataair')->nullable();
            $table->string('kepemilikanrumahlain')->nullable();
            $table->string('kepemilikantanahlain')->nullable();
            $table->string('lokasitanahditempatlain')->nullable();

            $table->string('pekerjaanutama')->nullable();
            $table->string('pekerjaansampingan')->nullable();
            $table->string('totalpendapatanperbulan')->nullable();
            $table->string('totalpengeluaranperbulan')->nullable();

            $table->string('pengetahuanrespondenirigasi')->nullable();
            $table->string('sumberinformasi')->nullable();
            $table->string('kesediandirekolasi')->nullable();
            $table->string('alasanpenolakanrelokasi')->nullable();
            $table->string('bentukpergantiandisukai')->nullable();
            $table->string('pendapatrespondenpemindahankolektif')->nullable();
            $table->decimal('x',8,5)->nullable();
            $table->decimal('y',8,5)->nullable();
            $table->string('foto')->nullable();
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
        Schema::dropIfExists('kuesioner_bangunan');
    }
}
