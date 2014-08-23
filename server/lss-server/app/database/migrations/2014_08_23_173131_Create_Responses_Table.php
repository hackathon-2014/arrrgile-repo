<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responses', function(Blueprint $table)
		{
			# AI PK	
			$table->increments('id');
			
			# fk of the sotry @ stories table
			$table->integer('story_id');
	
			# the order in which the user updates said sotry
			$table->integer('story_order');
	
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
		Schema::drop('responses');
	
	}

}
