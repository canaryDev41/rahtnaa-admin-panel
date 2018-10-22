<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rating_orders', function(Blueprint $table)
		{
			$table->bigInteger('id', true);
			$table->bigInteger('order_id');
			$table->bigInteger('worker_id')->nullable();
			$table->float('rating');
			$table->text('comment');
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
		Schema::drop('rating_orders');
	}

}
