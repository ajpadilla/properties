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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

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

	Route::get('select-list', [
		'as' => 'api.v1.typeProperties.select-list',
		'uses' => 'TypePropertyController@selectList'
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

	Route::get('select-list', [
		'as' => 'api.v1.disabilities.select-list',
		'uses' => 'DisabilityController@selectList'
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

	Route::get('select-list', [
		'as' => 'api.v1.typeIdentifications.select-list',
		'uses' => 'TypeIdentificationController@selectList'
	]);
});

/**
 * ------------------- API Route for typeCommunities ---------------
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

	Route::get('select-list', [
		'as' => 'api.v1.typeCommunities.select-list',
		'uses' => 'TypeCommunityController@selectList'
	]);
});


/**
 * ------------------- API Route for educationalLevels ---------------
 */

Route::group(['prefix' => 'educationalLevels'], function()
{
	Route::get('/',[
		'as' => 'api.educationalLevels.index',
		'uses' => 'EducationalLevelController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.educationalLevels.show',
			'uses' => 'EducationalLevelController@show'
	]);

	Route::post('store', [
			'as' => 'api.educationalLevels.store',
			'uses' => 'EducationalLevelController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.educationalLevels.update',
			'uses' => 'EducationalLevelController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.educationalLevels.delete',
		'uses' => 'EducationalLevelController@destroy'
	]);	

	Route::get('select-list', [
		'as' => 'api.v1.educationalLevels.select-list',
		'uses' => 'EducationalLevelController@selectList'
	]);
});


/**
 * ------------------- API Route for currencies ---------------
 */

Route::group(['prefix' => 'currencies'], function()
{
	Route::get('/',[
		'as' => 'api.currencies.index',
		'uses' => 'CurrencyController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.currencies.show',
			'uses' => 'CurrencyController@show'
	]);

	Route::post('store', [
			'as' => 'api.currencies.store',
			'uses' => 'CurrencyController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.currencies.update',
			'uses' => 'CurrencyController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.currencies.delete',
		'uses' => 'CurrencyController@destroy'
	]);	

	Route::get('select-list', [
		'as' => 'api.v1.currencies.select-list',
		'uses' => 'CurrencyController@selectList'
	]);
});

/**
 * ------------------- API Route for typePqr ---------------
 */

Route::group(['prefix' => 'typePqr'], function()
{
	Route::get('/',[
		'as' => 'api.typePqr.index',
		'uses' => 'TypePqrController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typePqr.show',
			'uses' => 'TypePqrController@show'
	]);

	Route::post('store', [
			'as' => 'api.typePqr.store',
			'uses' => 'TypePqrController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typePqr.update',
			'uses' => 'TypePqrController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typePqr.delete',
		'uses' => 'TypePqrController@destroy'
	]);	
});

/**
 * ------------------- API Route for TypeRepresentatives ---------------
 */

Route::group(['prefix' => 'typeRepresentatives'], function()
{
	Route::get('/',[
		'as' => 'api.typeRepresentatives.index',
		'uses' => 'TypeRepresentativeController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typeRepresentatives.show',
			'uses' => 'TypeRepresentativeController@show'
	]);

	Route::post('store', [
			'as' => 'api.typeRepresentatives.store',
			'uses' => 'TypeRepresentativeController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typeRepresentatives.update',
			'uses' => 'TypeRepresentativeController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typeRepresentatives.delete',
		'uses' => 'TypeRepresentativeController@destroy'
	]);	
});

/**
 * ------------------- API Route for TypeInfractions ---------------
 */

Route::group(['prefix' => 'typeInfractions'], function()
{
	Route::get('/',[
		'as' => 'api.typeInfractions.index',
		'uses' => 'TypeInfractionController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.typeInfractions.show',
			'uses' => 'TypeInfractionController@show'
	]);

	Route::post('store', [
			'as' => 'api.typeInfractions.store',
			'uses' => 'TypeInfractionController@store'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.typeInfractions.update',
			'uses' => 'TypeInfractionController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.typeInfractions.delete',
		'uses' => 'TypeInfractionController@destroy'
	]);	
});

/**
 * ------------------- API Route for Countries ---------------
 */

Route::group(['prefix' => 'countries'], function()
{
	Route::get('/',[
		'as' => 'api.countries.index',
		'uses' => 'CountryController@index'
	]);	

	Route::post('store', [
			'as' => 'api.countries.store',
			'uses' => 'CountryController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.countries.show',
			'uses' => 'CountryController@show'
	]);
	
	Route::patch('update/{id?}', [
			'as' => 'api.countries.update',
			'uses' => 'CountryController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.countries.delete',
		'uses' => 'CountryController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.countries.select-list',
		'uses' => 'CountryController@selectList'
	]);
});

/**
 * ------------------- API Route for States ---------------
 */

Route::group(['prefix' => 'states'], function()
{
	Route::get('/',[
		'as' => 'api.states.index',
		'uses' => 'StateController@index'
	]);	

	Route::post('store', [
			'as' => 'api.states.store',
			'uses' => 'StateController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.states.show',
			'uses' => 'StateController@show'
	]);
	
	Route::patch('update/{id?}', [
			'as' => 'api.states.update',
			'uses' => 'StateController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.states.delete',
		'uses' => 'StateController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.states.select-list',
		'uses' => 'StateController@selectList'
	]);

	Route::get('by-country/{countryId?}', [
		'as' => 'api.v1.states.byCountry',
		'uses' => 'StateController@byCountry'
	]);
});

/**
 * ------------------- API Route for Municipalities ---------------
 */

Route::group(['prefix' => 'municipalities'], function()
{
	Route::get('/',[
		'as' => 'api.municipalities.index',
		'uses' => 'MunicipalityController@index'
	]);	

	Route::post('store', [
			'as' => 'api.municipalities.store',
			'uses' => 'MunicipalityController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.municipalities.show',
			'uses' => 'MunicipalityController@show'
	]);
	
	Route::patch('update/{id?}', [
			'as' => 'api.municipalities.update',
			'uses' => 'MunicipalityController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.municipalities.delete',
		'uses' => 'MunicipalityController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.municipalities.select-list',
		'uses' => 'MunicipalityController@selectList'
	]);

	Route::get('by-state/{stateId?}', [
		'as' => 'api.v1.municipalities.byState',
		'uses' => 'MunicipalityController@byState'
	]);
});

/**
 * ------------------- API Route for Communities ---------------
 */

Route::group(['prefix' => 'communities'], function()
{
	Route::get('/',[
		'as' => 'api.communities.index',
		'uses' => 'CommunityController@index'
	]);	

	Route::get('show/{id?}', [
			'as' => 'api.communities.show',
			'uses' => 'CommunityController@show'
	]);
	
	
	Route::post('store', [
			'as' => 'api.communities.store',
			'uses' => 'CommunityController@store'
	]);


	Route::patch('update/{id?}', [
			'as' => 'api.communities.update',
			'uses' => 'CommunityController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.communities.delete',
		'uses' => 'CommunityController@destroy'
	]);

	Route::post('add-photo/{communityId?}', [
		'as' => 'api.communities.addPhoto',
		'uses' => 'CommunityController@addPhoto'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.communities.select-list',
		'uses' => 'CommunityController@selectList'
	]);

	Route::get('total-briefcase-properties/{id?}', [
		'as' => 'api.v1.communities.total.briefcase.properties',
		'uses' => 'CommunityController@totalBriefcaseForProperties'
	]);
});

/**
 * ------------------- API Route for Persons ---------------
 */

Route::group(['prefix' => 'persons'], function()
{
	Route::get('/',[
		'as' => 'api.persons.index',
		'uses' => 'PersonController@index'
	]);	

	Route::post('store', [
		'as' => 'api.persons.store',
		'uses' => 'PersonController@store'
	]);


	Route::get('show/{id?}', [
			'as' => 'api.persons.show',
			'uses' => 'PersonController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.persons.update',
			'uses' => 'PersonController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.persons.delete',
		'uses' => 'PersonController@destroy'
	]);

	Route::post('add-photo/{personId?}', [
		'as' => 'api.persons.addPhoto',
		'uses' => 'PersonController@addPhoto'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.persons.select-list',
		'uses' => 'PersonController@selectList'
	]);

});

/**
 * ------------------- API Route for Properties ---------------
 */

Route::group(['prefix' => 'properties'], function()
{
	Route::get('/',[
		'as' => 'api.properties.index',
		'uses' => 'PropertyController@index'
	]);	

	Route::post('store', [
		'as' => 'api.properties.store',
		'uses' => 'PropertyController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.properties.show',
			'uses' => 'PropertyController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.properties.update',
			'uses' => 'PropertyController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.properties.delete',
		'uses' => 'PropertyController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.properties.select-list',
		'uses' => 'PropertyController@selectList'
	]);

	Route::get('by-community/{communityId?}', [
		'as' => 'api.v1.properties.byCommunity',
		'uses' => 'PropertyController@byCommunity'
	]);

	Route::post('add-photo/{personId?}', [
		'as' => 'api.properties.addPhoto',
		'uses' => 'PropertyController@addPhoto'
	]);

	Route::get('current-briefcase-total/{id?}', [
		'as' => 'api.v1.properties.current.briefcase.total',
		'uses' => 'PropertyController@currentBriefcaseTotal'
	]);

});


/**
 * ------------------- API Route for Briefcase ---------------
 */

Route::group(['prefix' => 'briefcases'], function()
{
	Route::get('/',[
		'as' => 'api.briefcases.index',
		'uses' => 'BriefcaseController@index'
	]);	

	Route::post('store', [
		'as' => 'api.briefcases.store',
		'uses' => 'BriefcaseController@store'
	]);


	Route::get('show/{id?}', [
			'as' => 'api.briefcases.show',
			'uses' => 'BriefcaseController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.briefcases.update',
			'uses' => 'BriefcaseController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.briefcases.delete',
		'uses' => 'BriefcaseController@destroy'
	]);

	/**
	 * ------------------- API Route for Briefcase-Interest ---------------
	 */

	Route::group(['prefix' => 'interests'], function()
	{
		
		Route::post('store/briefcase/interest/{id?}', [
			'as' => 'api.briefcases.interests.store',
			'uses' => 'BriefcaseController@storeInterest'
		]);

		Route::get('{id?}', [
			'as' => 'api.v1.briefcases.interests.index',
			'uses' => 'BriefcaseController@interests'
		]);

		Route::get('show/{id?}/{interestId?}', [
			'as' => 'api.v1.briefcases.interests.show',
			'uses' => 'BriefcaseController@interest'
		]);

		Route::patch('update/{id?}/{interestId?}/{interestPivotId?}', [
			'as' => 'api.v1.briefcases.interests.update',
			'uses' => 'BriefcaseController@interestUpdate'
		]);

		Route::delete('delete/{id?}/{interestId?}/{interestPivotId?}', [
			'as' => 'api.v1.briefcases.interests.delete',
			'uses' => 'BriefcaseController@deleteInterest'
		]);

		Route::get('availableInterests/{id?}', [
			'as' => 'api.v1.briefcases.available.interests',
			'uses' => 'BriefcaseController@availableInterests'
		]);

	});


	/**
	 * ------------------- API Route for Briefcase-Sanction ---------------
	 */
	Route::group(['prefix' => 'sanctions'], function()
	{
		Route::post('store/briefcase/sanctions/{id?}', [
			'as' => 'api.briefcases.sanctions.store',
			'uses' => 'BriefcaseController@storeSanction'
		]);

		Route::get('{id?}', [
			'as' => 'api.v1.briefcases.sanctions.index',
			'uses' => 'BriefcaseController@sanctions'
		]);

		Route::get('show/{id?}/{sanctionId?}', [
			'as' => 'api.v1.briefcases.sanctions.show',
			'uses' => 'BriefcaseController@sanction'
		]);

		Route::patch('update/{id?}/{sanctionId?}/{sanctionPivotId?}', [
			'as' => 'api.v1.briefcases.sanctions.update',
			'uses' => 'BriefcaseController@sanctionUpdate'
		]);

		Route::delete('delete/{id?}/{sanctionId?}/{sanctionPivotId?}', [
			'as' => 'api.v1.briefcases.sanctions.delete',
			'uses' => 'BriefcaseController@deleteSanction'
		]);

		Route::get('availableSanctions/{id?}', [
			'as' => 'api.v1.briefcases.available.sanctions',
			'uses' => 'BriefcaseController@availableSanctions'
		]);

	});

	/**
	 * ------------------- API Route for Briefcase-Due ---------------
	 */
	Route::group(['prefix' => 'dues'], function()
	{
		Route::post('store/briefcase/dues/{id?}', [
			'as' => 'api.briefcases.dues.store',
			'uses' => 'BriefcaseController@storeDue'
		]);

		Route::get('{id?}', [
			'as' => 'api.v1.briefcases.dues.index',
			'uses' => 'BriefcaseController@dues'
		]);

		Route::get('show/{id?}/{sanctionId?}', [
			'as' => 'api.v1.briefcases.dues.show',
			'uses' => 'BriefcaseController@due'
		]);

		Route::patch('update/{id?}/{sanctionId?}/{sanctionPivotId?}', [
			'as' => 'api.v1.briefcases.dues.update',
			'uses' => 'BriefcaseController@dueUpdate'
		]);

		Route::delete('delete/{id?}/{sanctionId?}/{sanctionPivotId?}', [
			'as' => 'api.v1.briefcases.dues.delete',
			'uses' => 'BriefcaseController@deleteDue'
		]);

		Route::get('availableDues/{id?}', [
			'as' => 'api.v1.briefcases.available.dues',
			'uses' => 'BriefcaseController@availableDues'
		]);

	});

});

Route::group(['prefix' => 'interests'], function()
{
	Route::get('/',[
		'as' => 'api.interests.index',
		'uses' => 'InterestController@index'
	]);	

	Route::post('store', [
		'as' => 'api.interests.store',
		'uses' => 'InterestController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.interests.show',
			'uses' => 'InterestController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.interests.update',
			'uses' => 'InterestController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.interests.delete',
		'uses' => 'InterestController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.interests.select-list',
		'uses' => 'InterestController@selectList'
	]);
});

Route::group(['prefix' => 'sanctions'], function()
{
	Route::get('/',[
		'as' => 'api.sanctions.index',
		'uses' => 'SanctionController@index'
	]);	

	Route::post('store', [
		'as' => 'api.sanctions.store',
		'uses' => 'SanctionController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.sanctions.show',
			'uses' => 'SanctionController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.sanctions.update',
			'uses' => 'SanctionController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.sanctions.delete',
		'uses' => 'SanctionController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.sanctions.select-list',
		'uses' => 'SanctionController@selectList'
	]);
});

Route::group(['prefix' => 'dues'], function()
{
	Route::get('/',[
		'as' => 'api.dues.index',
		'uses' => 'DueController@index'
	]);	

	Route::post('store', [
		'as' => 'api.dues.store',
		'uses' => 'DueController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.dues.show',
			'uses' => 'DueController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.dues.update',
			'uses' => 'DueController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.dues.delete',
		'uses' => 'DueController@destroy'
	]);

	Route::get('select-list', [
		'as' => 'api.v1.dues.select-list',
		'uses' => 'DueController@selectList'
	]);
});

Route::group(['prefix' => 'suppliers'], function()
{
	Route::get('/',[
		'as' => 'api.suppliers.index',
		'uses' => 'SupplierController@index'
	]);	

	Route::post('store', [
		'as' => 'api.suppliers.store',
		'uses' => 'SupplierController@store'
	]);

	Route::get('show/{id?}', [
			'as' => 'api.suppliers.show',
			'uses' => 'SupplierController@show'
	]);

	Route::patch('update/{id?}', [
			'as' => 'api.suppliers.update',
			'uses' => 'SupplierController@update'
	]);

	Route::delete('delete/{id?}', [
		'as' => 'api.suppliers.delete',
		'uses' => 'SupplierController@destroy'
	]);

});