<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Layer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layer', function(Blueprint $table)
		{
			$table->increments('id');
	        $table->string('namalayer', 100);
	        $table->string('urllayer', 200);
	        $table->string('kodelayer',50);
            $table->boolean('aktif')->default(false);
            $table->integer('urutanlayer')->default(0);
            $table->integer('parent_id')->unsigned()->default(0);
	        $table->enum('tipelayer',array('ol','esri','olgroup','olimage'))->default('ol');
	        $table->decimal('option_opacity')->default(1.0);
	        $table->boolean('option_visible')->default(false);
            $table->integer('option_mode')->nullable()->unsigned()->default(1);
            $table->string('option_style')->nullable()->default(0);
            
            $table->double('x_min')->nullable();
			$table->double('y_min')->nullable();
			$table->double('x_max')->nullable();
            $table->double('y_max')->nullable();
            
	        $table->text('jsonfield')->nullable();
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
        Schema::dropIfExists('layer');
    }
}
