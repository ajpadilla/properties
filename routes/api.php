<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * ------------------- API Route for Schools ---------------
 */

Route::group(['prefix' => 'typeProperties'], function()
{
	Route::get('/',[
		'as' => 'api.typeProperties.index',
		'uses' => 'TypePropertyController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typeProperties.show',
			'uses' => 'TypePropertyController@show'
	]);

	Route::post('store', [
			'as' => 'api.typeProperties.store',
			'uses' => 'TypePropertyController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typeProperties.update',
			'uses' => 'TypePropertyController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typeProperties.delete',
		'uses' => 'TypePropertyController@destroy'
	]);		
});

/**
 * ------------------- API Route for Schools ---------------
 */

Route::group(['prefix' => 'typeAnimals'], function()
{
	Route::get('/',[
		'as' => 'api.typeAnimals.index',
		'uses' => 'TypeAnimalController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typeAnimals.show',
			'uses' => 'TypeAnimalController@show'
	]);

	Route::post('store', [
			'as' => 'api.typeAnimals.store',
			'uses' => 'TypeAnimalController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typeAnimals.update',
			'uses' => 'TypeAnimalController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typeAnimals.delete',
		'uses' => 'TypeAnimalController@destroy'
	]);
});
