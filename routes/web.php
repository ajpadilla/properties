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

	/**
	 * ------------------- Route index for typeProperty ---------------
	 */

	Route::group(['prefix' => 'typeProperties'], function(){

		Route::get('', [
			'as' => 'types.properties',
			'uses' => function() {
				return view('typeProperties.index');
			}
		]);	
	});

	/**
	 * ------------------- Route index for typeAnimals ---------------
	 */
	Route::group(['prefix' => 'typeAnimals'], function(){

		Route::get('', [
			'as' => 'types.animals',
			'uses' => function() {
				return view('typeAnimals.index');
			}
		]);	
	});

	

	

}); 


Auth::routes();

//Route::get('/home', 'HomeController@index');
