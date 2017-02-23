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


/* 
	* ------------------- Route for Schools ---------------
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
