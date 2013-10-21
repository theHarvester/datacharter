<?php

class ChartsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('charts')->truncate();

		$now = date('Y-m-d H:i:s', time());

		$charts = array(
			[	'name' => 'My First Chart',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ]
            

		);

		// Uncomment the below to run the seeder
		DB::table('charts')->insert($charts);
	}

}
