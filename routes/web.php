<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});

Route::get('vue-table', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
	
	Route::get('/dashboard', function () {
		return view('layouts.dashboard');
	});

	Route::get('types-properties', [
		'as' => 'types.properties',
		'uses' => function() {
			return view('typeProperties.index');
		}
	]);	
}); 


Auth::routes();

//Route::get('/home', 'HomeController@index');
