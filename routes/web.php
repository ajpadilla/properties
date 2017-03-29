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

/*Route::get('/', function () {
	return view('auth.login');
});*/

Route::get('/', [
	'as' => 'public.index',
	'uses' => 'HomeController@index'
]);


Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){
	
	Route::get('/dashboard', [
		'as' => 'dashboard',
		'uses' => 'HomeController@dashboard'
	]);

	/**
	 * ------------------- Route index for typeProperty ---------------
	 */

	Route::group(['prefix' => 'typeProperties'], function(){

		Route::get('', [
			'as' => 'typeProperties',
			'uses' => 'TypePropertyController@list'
		]);	
	});

	/**
	 * ------------------- Route index for typeAnimals ---------------
	 */
	Route::group(['prefix' => 'typeAnimals'], function(){

		Route::get('', [
			'as' => 'typeAnimals',
			'uses' => 'TypeAnimalController@list'
		]);	
	});


	/**
	 * ------------------- Route index for disabilities ---------------
	 */
	Route::group(['prefix' => 'disabilities'], function(){

		Route::get('', [
			'as' => 'disabilities',
			'uses' => 'DisabilityController@list'
		]);	
	});

	/**
	 * ------------------- Route index for typeIdentifications ---------------
	 */
	Route::group(['prefix' => 'typeIdentifications'], function(){

		Route::get('', [
			'as' => 'type.typeIdentifications',
			'uses' => function() {
				return view('typeIdentifications.index');
			}
		]);	
	});

}); 


Auth::routes();

