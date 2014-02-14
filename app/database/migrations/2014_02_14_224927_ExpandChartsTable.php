<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExpandChartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('charts', function(Blueprint $table) {
            $table->string('unit');
            $table->string('axis_label');
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
