<?php

class DistanceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		#To create a new record in the database from a model, simply create a new model instance and call the save method.
		# Instantiate new instance of said model
		$distance = new Distance();
		
		# fk of the sotry @ stories table
		$distance->story_id = 1;
		
		# fk of the sotry @ stories table
		$distance->reply_id = 1;
		
		# Distance the sotry has traveled
		$distance->distance_traveled = 0;
		
		#Current Latitude (SPARC HQ)
		$distance->location_current_lat = 32.776565999999995;
		
		# Current Longitude (SPARC HQ)
		$distance->location_current_long = -79.930922;
		
		# Eloquent Magic
		$distance->save();
		
		# Let us know what happned.
		$this->command->info('Seeded Distance Table'); 
	}

}

