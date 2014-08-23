<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stories', function(Blueprint $table)
		{
			# AI PK	
			$table->increments('id');
			
			# The title of the story, created when a user first builds said sotry
			$table->string('title');
			
			# A path to a file
			$table->string('file_name');
			
			# The the text string that tells the story
			$table->string('text');
			
			# fk of user id
			$table->integer('user_id');
			
			# This generates two columns: `created_at` and `updated_at`
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
		
		// drop the table
		Schema::drop('stories');
	
	}

}
