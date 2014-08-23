<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('distances', function(Blueprint $table)
		{
			# AI PK	
			$table->increments('id');
			
			# fk of the sotry @ stories table
			$table->integer('story_id')->nullable();
			
			# fk of the response @ responses table
			$table->integer('reply_id')->nullable();
			
			# Distance the sotry has traveled
			$table->integer('distance_traveled')->nullable();
				
			#Current Latitude 
			$table->float('location_current_lat');
	
			# Current Longitude
			$table->float('location_current_long');	
			
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
		Schema::drop('distances');
	
	}

}
