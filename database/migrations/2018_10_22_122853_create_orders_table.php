<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->bigInteger('id', true);
			$table->bigInteger('worker_id')->nullable();
			$table->bigInteger('client_id')->nullable();
			$table->float('total');
			$table->float('lat');
			$table->float('lng');
			$table->text('job');
			$table->string('start_date');
			$table->string('end_date');
			$table->text('tasks')->nullable();
			$table->boolean('status')->default(1);
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
