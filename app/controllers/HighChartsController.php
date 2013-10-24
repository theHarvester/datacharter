<?php

class HighChartsController extends BaseController {
	function __construct() {
        $this->beforeFilter('auth');
    }

	public function buildHighCharts($chartId){
	    $chartData = DB::table('data')
	    	->join('categories', 'data.category_id', '=', 'categories.id')
	    	->join('chart_categories', 'categories.id', '=', 'chart_categories.category_id')
	    	->join('charts', 'chart_categories.id', '=', 'charts.id')
	    	->where('charts.id', '=', $chartId)
	    	->where('data.timestamp', '>', date('Y-m-d H:i:s', strtotime('-30 days')))
	    	->orderBy('timestamp', 'asc')
	    	->get();

	    if(empty($chartData)){
	    	return View::make('highcharts.empty');
	    } else {
	    	$categoryLabels = array();
	    	foreach($chartData as $id => $value){
	    		$categoryLabels[$value->label][] = [$value->data,$value->timestamp];
	    		$title = $value->name;
	    	}
	    	return View::make('highcharts.ajax')
	    		->with('chartData', $chartData)
	    		->with('categoryLabels', $categoryLabels)
	    		->with('title', $title);
	    }
	}

}