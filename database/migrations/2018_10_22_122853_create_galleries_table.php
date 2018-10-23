<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('galleries', function(Blueprint $table)
		{
			$table->increments('id');
            $table->text('image');
            $table->text('job');
            $table->unsignedInteger('worker_id');
            $table->unsignedInteger('job_id');
			$table->boolean('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('galleries');
	}

}
