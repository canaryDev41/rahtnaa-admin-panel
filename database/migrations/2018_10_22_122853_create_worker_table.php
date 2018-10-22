<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worker', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('user_id');
			$table->text('national_id_image');
			$table->string('work_status')->default('new');
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
		Schema::drop('worker');
	}

}
