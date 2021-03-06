<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('worker_id');
			$table->unsignedInteger('user_id');
            $table->unsignedInteger('job_id');
            $table->float('total');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
			$table->dateTime('start_date');
			$table->dateTime('end_date');
			$table->text('tasks');
			$table->tinyInteger('status')->comment('0 => canceled, 1 => under-process, 2 => completed');
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
		Schema::drop('orders');
	}

}
