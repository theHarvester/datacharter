<?php

/**
    Index
*/

Route::get('/', array('as' => 'home', function () {
    if(Auth::check()){
        $charts = Chart::where('user_id', '=', Auth::user()->id)
            ->get();

        $categories = Category::where('user_id', '=', Auth::user()->id)->get();
        $categorySelect = array();
        foreach($categories as $category)
            $categorySelect[$category->id] = $category->name;

        return View::make('index.home')
            ->with('charts', $charts)
            ->with('categorySelect', $categorySelect);
    } else {
        return View::make('index.home');

    }
}));


Route::group(array('prefix' => 'account'), function()
{
    Route::post('login', 'AccountController@loginAttempt');
    Route::get('login', array('as' => 'login', 'uses' => 'AccountController@loginPage'))->before('guest');
    Route::get('logout', array('as' => 'logout', 'uses' => 'AccountController@logout'))->before('auth');
    Route::post('signup', 'AccountController@signupAttempt');
});



Route::group(array('before' => 'auth'), function()
{
    Route::resource('categories', 'CategoriesController');
    Route::resource('data', 'DataController');
    Route::get('highcharts/{chart_id}', 'HighChartsController@buildHighCharts');
    Route::resource('charts', 'ChartsController');
});


