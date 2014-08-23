<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		# Admin User
		$user = User::create(
			array(
				'username' => 'admin', 
				'password' => Hash::make('P@ssword'), 
				'email' => 'harrison.destefano@gmail.com'
			)
		);
		
		# Let us know what happned.
		$this->command->info('Seeded '.$user['username']);
	}

}

