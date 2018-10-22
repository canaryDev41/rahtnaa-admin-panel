<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkerJobTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worker_job', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('worker_id');
			$table->bigInteger('job_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worker_job');
	}

}
