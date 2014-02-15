<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddUnitToCharts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('charts', function(Blueprint $table) {
			$table->string('unit', 100);
			$table->string('axis_label', 100);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('charts', function(Blueprint $table) {
			$table->dropColumn('unit');
			$table->dropColumn('axis_label');
		});
	}

}
