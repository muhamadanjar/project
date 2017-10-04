<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KuesionerTanah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kuesionertanah', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('no_responden')->nullable();
            $table->bigInteger('kode_prov')->nullable();
            $table->bigInteger('kode_kab')->nullable();
            $table->bigInteger('kode_kec')->nullable();
            $table->bigInteger('kode_kel')->nullable();
            $table->string('jorong')->nullable();
            $table->timestamp('tanggal')->nullable();
            $table->integer('id_user')->nullable();

            $table->string('nama_pemilik',100)->nullable();
            $table->text('alamat_pemilik')->nullable();
            $table->string('kepemilikan_lahan',100)->nullable();
            $table->string('pemanfaatan_tanah',100)->nullable();

            $table->string('tanaman_hortikultura',100)->nullable();
            $table->string('tanaman_hias',100)->nullable();
            $table->string('tanaman_pelindung',100)->nullable();
            $table->string('tanaman_lainnya',100)->nullable();

            $table->timestamps();
        });

        DB::statement("SELECT AddGeometryColumn('kuesionertanah', 'the_geom', 4326, 'POINT', 2 )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kuesionertanah');
    }
}
