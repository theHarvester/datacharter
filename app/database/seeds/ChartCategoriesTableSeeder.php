<?php

class ChartCategoriesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('chart_categories')->truncate();
		$now = date('Y-m-d H:i:s', time());

		$chart_categories = array(
			[	
				'category_id' => 2,
                'chart_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
             ]
		);

		// Uncomment the below to run the seeder
		DB::table('chart_categories')->insert($chart_categories);
	}

}
 	