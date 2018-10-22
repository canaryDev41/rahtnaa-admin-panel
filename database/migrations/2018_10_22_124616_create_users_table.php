<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->bigInteger('id');
			$table->string('name');
			$table->string('city');
			$table->string('phone');
			$table->string('email')->nullable();
			$table->text('password');
			$table->text('image')->nullable();
			$table->string('type');
			$table->float('rating')->default(0);
			$table->boolean('status')->default(0);
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
		Schema::drop('users');
	}

}
