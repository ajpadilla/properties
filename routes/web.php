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

	/**
	 * ------------------- Route index for disabilities ---------------
	 */
	Route::group(['prefix' => 'disabilities'], function(){

		Route::get('', [
			'as' => 'disabilities',
			'uses' => function() {
				return view('disabilities.index');
			}
		]);	
	});

	/**
	 * ------------------- Route index for typeIdentifications ---------------
	 */
	Route::group(['prefix' => 'typeIdentifications'], function(){

		Route::get('', [
			'as' => 'type.identifications',
			'uses' => function() {
				return view('typeIdentifications.index');
			}
		]);	
	});

	/**
	 * ------------------- Route index for typeCommunities ---------------
	 */
	Route::group(['prefix' => 'typeCommunities'], function(){

		Route::get('', [
			'as' => 'type.communities',
			'uses' => function() {
				return view('typeCommunities.index');
			}
		]);	
	});

	/**
	 * ------------------- Route index for educationalLevels ---------------
	 */
	Route::group(['prefix' => 'educationalLevels'], function(){

		Route::get('', [
			'as' => 'educational.levels',
			'uses' => function() {
				return view('educationalLevels.index');
			}
		]);	
	});

	/**
	 * ------------------- Route index for currencies ---------------
	 */
	Route::group(['prefix' => 'currencies'], function(){

		Route::get('', [
			'as' => 'currencies',
			'uses' => function() {
				return view('currencies.index');
			}
		]);	
	});

	/**
	 * ------------------- Route index for typePqr ---------------
	 */
	Route::group(['prefix' => 'typePqr'], function(){

		Route::get('', [
			'as' => 'typePqr',
			'uses' => function() {
				return view('typePqr.index');
			}
		]);	
	});





}); 


Auth::routes();

//Route::get('/home', 'HomeController@index');
