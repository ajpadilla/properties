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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'web']], function (){
	
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
			'uses' => 'TypePropertyController@listItems'
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
			'as' => 'typeIdentifications',
			'uses' => 'TypeIdentificationController@list'
		]);	
	});

	/**
	 * ------------------- Route index for typeCommunities ---------------
	 */
	Route::group(['prefix' => 'typeCommunities'], function(){

		Route::get('', [
			'as' => 'typeCommunities',
			'uses' => 'TypeCommunityController@list'
		]);	
	});

	/**
	 * ------------------- Route index for educationalLevels ---------------
	 */
	Route::group(['prefix' => 'educationalLevels'], function(){

		Route::get('', [
			'as' => 'educational.levels',
			'uses' =>'EducationalLevelController@list'
		]);	
	});

	/**
	 * ------------------- Route index for currencies ---------------
	 */
	Route::group(['prefix' => 'currencies'], function(){

		Route::get('', [
			'as' => 'currencies',
			'uses' => 'CurrencyController@list'
		]);	
	});

	/**
	 * ------------------- Route index for typePqr ---------------
	 */
	Route::group(['prefix' => 'typePqr'], function(){

		Route::get('', [
			'as' => 'typePqr',
			'uses' => 'TypePqrController@list'
		]);	
	});

	/**
	 * ------------------- Route index for TypeRepresentatives ---------------
	 */
	Route::group(['prefix' => 'typeRepresentatives'], function(){

		Route::get('', [
			'as' => 'typeRepresentatives',
			'uses' =>'TypeRepresentativeController@list'
		]);	
	});

	/**
	 * ------------------- Route index for TypeInfractions ---------------
	 */
	Route::group(['prefix' => 'typeInfractions'], function(){

		Route::get('', [
			'as' => 'typeInfractions',
			'uses' => 'TypeInfractionController@list'
		]);	
	});

	/**
	 * ------------------- Route index for Countries ---------------
	 */
	Route::group(['prefix' => 'countries'], function(){

		Route::get('', [
			'as' => 'countries',
			'uses' => 'CountryController@list'
		]);	
	});

	/**
	 * ------------------- Route index for State ---------------
	 */
	Route::group(['prefix' => 'states'], function(){

		Route::get('', [
			'as' => 'states',
			'uses' => 'StateController@list'
		]);	
	});

	/**
	 * ------------------- Route index for Municipalities ---------------
	 */
	Route::group(['prefix' => 'municipalities'], function(){

		Route::get('', [
			'as' => 'municipalities',
			'uses' => 'MunicipalityController@list'
		]);	
	});

	/**
	 * ------------------- Route index for Communities ---------------
	 */
	Route::group(['prefix' => 'communities'], function(){

		Route::get('', [
			'as' => 'communities.index',
			'uses' => 'CommunityController@showList'
		]);	
	});


	/**
	 * ------------------- Route index for Persons ---------------
	 */
	Route::group(['prefix' => 'persons'], function(){

		Route::get('', [
			'as' => 'persons',
			'uses' => 'PersonController@showList'
		]);	
	});

	/**
	 * ------------------- Route index for Properties ---------------
	 */
	Route::group(['prefix' => 'properties'], function(){

		Route::get('', [
			'as' => 'properties',
			'uses' => 'PropertyController@showList'
		]);	
	});

	/**
	 * ------------------- Route index for Briefcases ---------------
	 */
	Route::group(['prefix' => 'briefcases'], function(){

		Route::get('', [
			'as' => 'briefcases',
			'uses' => 'BriefcaseController@showList'
		]);	
	});

	/**
	 * ------------------- Route index for Briefcases ---------------
	 */
	Route::group(['prefix' => 'upload'], function(){

		Route::get('', [
			'as' => 'upload',
			'uses' => 'FileController@create'
		]);	

		Route::post('store',[
			'as' => 'upload.import',
			'uses' => 'FileController@import'
		]);	
	});

	/**
	 * ------------------- Route index for Interests ---------------
	 */
	Route::group(['prefix' => 'interests'], function(){

		Route::get('', [
			'as' => 'interests.index',
			'uses' => 'InterestController@showList'
		]);	
	});

	/**
	 * ------------------- Route index for Sanction ---------------
	 */
	Route::group(['prefix' => 'sanctions'], function(){

		Route::get('', [
			'as' => 'sanctions.index',
			'uses' => 'SanctionController@showList'
		]);	
	});


}); 


Auth::routes();

