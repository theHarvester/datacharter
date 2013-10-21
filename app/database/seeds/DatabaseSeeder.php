<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->call('CategoriesTableSeeder');
		$this->call('DataTableSeeder');
		$this->call('ChartsTableSeeder');
		$this->call('ChartCategoriesTableSeeder');
	}

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(
        	array(
        		'username' => 'bob',
        		'email' => 'foo@bar.com',
        		'password' => Hash::make('test')
        		)
        	);
    	$this->call('CategoriesTableSeeder');
		$this->call('DataTableSeeder');
		$this->call('ChartsTableSeeder');
		$this->call('ChartCategoriesTableSeeder');
	}

}