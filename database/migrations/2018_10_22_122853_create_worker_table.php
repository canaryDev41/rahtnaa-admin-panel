<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('city_id');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('password');
            $table->text('image')->nullable();
            $table->float('rating')->default(0);
            $table->boolean('status')->default(0);
			$table->text('national_id_image');
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
