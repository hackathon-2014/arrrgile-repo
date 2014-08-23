<?php

class StoryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		#To create a new record in the database from a model, simply create a new model instance and call the save method.
		# Instantiate new instance of said model
		$story = new Story();
		
		# The title of the story, created when a user first builds said sotry
		$story->title = 'At 100 Years Old';
		
		# The the text string that tells the story
		$story->text= 'In ut nullam quam consequat magna sapien curabitur dictum dictumst velit, nam suspendisse tempor consectetur nibh suspendisse nulla donec ma';
		# fk of user id
		$story->user_id= '1';
		
		# Eloquent Magic
		$story->save();
		
		# Let us know what happned.
		$this->command->info('Seeded Story Table'); 
	}

}

