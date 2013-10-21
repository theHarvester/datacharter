<?php

class DataTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('data')->truncate();
		$yesterday = date('Y-m-d H:i:s', time() - 60*60*24);
		$lastWeek = date('Y-m-d H:i:s', time() - 60*60*24*7);
        $anotherTime = date('Y-m-d H:i:s', time() - 60*60*24*3);
		$now = date('Y-m-d H:i:s', time());

		$data = array(
            [	'category_id' => 2,
                'data' => '300',
                'timestamp' => $lastWeek,
                'created_at' => $lastWeek,
                'updated_at' => $lastWeek
            ],
            [   'category_id' => 2,
                'data' => '300',
                'timestamp' => $anotherTime,
                'created_at' => $anotherTime,
                'updated_at' => $anotherTime
            ],
            [   'category_id' => 2,
                'data' => '200',
                'timestamp' => $yesterday,
                'created_at' => $yesterday,
                'updated_at' => $yesterday
            ],
            [	'category_id' => 2,
                'data' => '100',
                'timestamp' => $now,
                'created_at' => $now,
                'updated_at' => $now
            ]

		);

		// Uncomment the below to run the seeder
		DB::table('data')->insert($data);
	}

}
