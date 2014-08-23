<?php

class ReplyTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		#To create a new record in the database from a model, simply create a new model instance and call the save method.
		# Instantiate new instance of said model
		$reply = new Reply();
		
		# fk of the sotry @ stories table
		$reply->story_id = '1';
		
		# The the text string that tells the story
		$reply->text = 'Response ullam quam consequat magna sapien curabitur dictum dictumst velit, nam suspendisse tempor consectetur nibh suspendisse nulla donec ma';
		
		# fk of user id
		$reply->user_id= '1';
		
		# Eloquent Magic
		$reply->save();
		
		# Let us know what happned.
		$this->command->info('Seeded Story Table'); 
	}

}

