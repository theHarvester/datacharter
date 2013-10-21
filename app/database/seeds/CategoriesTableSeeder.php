<?php

class CategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('categories')->truncate();

		$now = date('Y-m-d H:i:s');

		$categories = array(
			[	'name'       => 'Weight',
				'label' 	 => 'Weight',
                'user_id'    => 1,
                'created_at' => $now,
                'updated_at' => $now
            ],
			[	'name'       => 'Bench',
				'label' 	 => 'Bench',
                'user_id'    => 1,
                'created_at' => $now,
                'updated_at' => $now
            ]

			// ['name' => 'Weight', 'user_id' => 1],
    		// ['name' => 'Bench', 'user_id' => 1]
		);

		// Uncomment the below to run the seeder
		DB::table('categories')->insert($categories);
	}

}
