<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// create the users table and columns
		Schema::create('users', function(Blueprint $table)
		{	
			# AI PK	
			$table->increments('id');
			
			# The name user defines to be known in the app, email by default - less @.com
			$table->string('username')->nullable();
			
			# user password, hashed
			$table->string('password');
			
			# user email
			$table->string('email');
			
			# when the user was created	
			$table->timestamps();
			
			# token given by laravel when the user is created
			$table->rememberToken();
				
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// undo the up method
		Schema::drop('users');
	}

}