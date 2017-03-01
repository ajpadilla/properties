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
 * ------------------- API Route for typeProperties ---------------
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
 * ------------------- API Route for typeAnimals ---------------
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

/**
 * ------------------- API Route for disabilities ---------------
 */

Route::group(['prefix' => 'disabilities'], function()
{
	Route::get('/',[
		'as' => 'api.disabilities.index',
		'uses' => 'DisabilityController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.disabilities.show',
			'uses' => 'DisabilityController@show'
	]);

	Route::post('store', [
			'as' => 'api.disabilities.store',
			'uses' => 'DisabilityController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.disabilities.update',
			'uses' => 'DisabilityController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.disabilities.delete',
		'uses' => 'DisabilityController@destroy'
	]);
});


/**
 * ------------------- API Route for typeIdentifications ---------------
 */

Route::group(['prefix' => 'typeIdentifications'], function()
{
	Route::get('/',[
		'as' => 'api.typeIdentifications.index',
		'uses' => 'TypeIdentificationController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typeIdentifications.show',
			'uses' => 'TypeIdentificationController@show'
	]);

	Route::post('store', [
			'as' => 'api.typeIdentifications.store',
			'uses' => 'TypeIdentificationController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typeIdentifications.update',
			'uses' => 'TypeIdentificationController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typeIdentifications.delete',
		'uses' => 'TypeIdentificationController@destroy'
	]);
});

/**
 * ------------------- API Route for typeIdentifications ---------------
 */

Route::group(['prefix' => 'typeCommunities'], function()
{
	Route::get('/',[
		'as' => 'api.typeCommunities.index',
		'uses' => 'TypeCommunityController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typeCommunities.show',
			'uses' => 'TypeCommunityController@show'
	]);

	Route::post('store', [
			'as' => 'api.typeCommunities.store',
			'uses' => 'TypeCommunityController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typeCommunities.update',
			'uses' => 'TypeCommunityController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typeCommunities.delete',
		'uses' => 'TypeCommunityController@destroy'
	]);
});
