<?php

/**
    Index
*/

Route::get('/', array('as' => 'home', function () {
	return View::make('index.home');
}));

/**
    Login
*/

Route::get('account/login', array('as' => 'login', function () {
    return View::make('account.login');
}))->before('guest');

Route::post('account/login', function () {
	$user = array(
        'username' => Input::get('username'),
        'password' => Input::get('password')
    );
    
    if (Auth::attempt($user)) {
        return Redirect::route('home')
            ->with('flash_notice', 'You are successfully logged in.');
    }
    
    // authentication failure! lets go back to the login page
    return Redirect::route('login')
        ->with('flash_error', 'Your username/password combination was incorrect.')
        ->withInput();
});

/**
    Logout
*/

Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('home')
        ->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');

/**
    Signup
*/

Route::post('account/signup', function () {
    $user = array(
        'username' => Input::get('username'),
        'email' => Input::get('email'),
        'password' => Input::get('password')
    );
        
    // if (Auth::attempt($user)) {
    //     return Redirect::route('home')
    //         ->with('flash_notice', 'You are successfully logged in.');
    // }
    dd($user);
    
    // authentication failure! lets go back to the login page
    // return Redirect::route('login')
    //     ->with('flash_error', 'Your username/password combination was incorrect.')
    //     ->withInput();
});

/**
    Account
*/

Route::get('account/edit', array('as' => 'account', function () { 
    return View::make('account');
}))->before('auth');



// Route::get('make_user', array('as' => 'make_user', function(){
// 	$username =  strtolower(Input::get('username'));
// 	User::create([
// 	        'username' => $username,
// 	        'password' => Hash::make(Input::get('password')),
// 	        ]);

// 	$user = User::where('username', '=', $username)->first();

// Auth::login($user);
// }));

// Route::get('categories/{category_id}', 'CategoriesController@dataByCategoryId');
Route::resource('categories', 'CategoriesController');
Route::resource('data', 'DataController');
Route::get('highcharts/{chart_id}', 'HighChartsController@buildHighCharts')->before('auth');
Route::resource('charts', 'ChartsController');
// Route::resource('chart_categories', 'Chart_categoriesController');