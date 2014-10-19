<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
      User::truncate();
      
      User::create([
        'username' => 'dacm26',
        'email' => 'dacm26@gmail.com',
        'password' => '1234'
      ]);

      User::create([
        'username' => 'dacm12',
        'email' => 'dacm12@hotmail.com',
        'password' => '1234'
      ]);
      
	}

}
