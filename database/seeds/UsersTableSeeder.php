<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		\App\User::create([
			'name' => 'Andreas Beasley',
			'email' => 'andreas@sapioweb.com',
			'password' => bcrypt('andreas@sapioweb.com'),
		]);
	}
}
