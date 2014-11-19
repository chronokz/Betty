<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table)
		{
            $table->increments('id');
		    $table->string('text');
            $table->string('link');
            $table->integer('position');
            $table->integer('parent_id');
            $table->integer('depth');
            $table->integer('left');
            $table->integer('right');
            $table->integer('public');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu');
	}

}
