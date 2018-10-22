<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkerGalleryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worker_gallery', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('worker_id');
			$table->text('image');
			$table->text('job');
			$table->bigInteger('job_id')->default(0);
			$table->integer('status')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worker_gallery');
	}

}
