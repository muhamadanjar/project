<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleLayeresri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_layeresri', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('layer_id');
            $table->primary(['role_id', 'layer_id']);
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_layeresri');
    }
}
