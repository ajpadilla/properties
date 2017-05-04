<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Currency;
use App\Models\Country;
use App\Models\State;
use App\Models\Municipality;
use App\Models\Disability;
use App\Models\EducationalLevel;
use App\Models\TypeIdentification;
use App\Models\Person;
use App\Models\TypeCommunity;
use App\Models\Community;
use App\Models\TypeProperty;
use App\Models\Property;

class FileController extends Controller
{
	public function import()
	{
		$path = public_path().'/'.'import.csv';

		Excel::load($path, function($reader) {
			foreach ($reader->get() as $item) {

				$currency = Currency::where('name','=',$item->currency_name_person)->first();
				if(empty($currency)){
					$currency = Currency::create(['name' => $item->currency_name_person]);
				}

				$country = Country::where('code','=',$item->country_code_person)->first();
				if(empty($country)){
					$country = Country::create([
						'code' => $item->country_code_person, 
						'name' => $item->country_name_person, 
						'language' => $item->country_language_person, 
						'currency_id' => $currency->id
						]);
				}

				$state = State::where('code','=',$item->state_code_person)->first();
				if(empty($state)){
					$state = State::create([
						'code' => $item->state_code_person, 
						'name' => $item->state_name_person, 
						'area_code' => $item->state_area_code_person, 
						'country_id' => $country->id
						]);
				}

				$municipality = Municipality::where('code','=',$item->municipality_code_person)->first();
				if(empty($municipality)){
					$municipality = Municipality::create([
						'code' => $item->municipality_code_person, 
						'name' => $item->municipality_name_person, 
						'state_id' => $state->id
						]);
				}

				if(!empty($item->disability_name_person)){
					$disability = Disability::where('name','=',$item->disability_name_person)
					->first();
					if(empty($disability)){
						$disability = Disability::create([
							'name' => $item->disability_name_person
						]);
					}
				}

				$educationalLevel = EducationalLevel::where('name','=',$item->educational_level_name_person)
				->first();
				if(empty($educationalLevel)){
					$educationalLevel = EducationalLevel::create([
						'name' => $item->educational_level_name_person
					]);
				}

				$typeIdentification = TypeIdentification::where('name','=',$item->type_identification_name_person)
				->first();
				if(empty($typeIdentification)){
					$typeIdentification = TypeIdentification::create([
						'name' => $item->type_identification_name_person
					]);
				}

				$person = Person::where('identification_number','=',$item->identification_number_person)
				->first();
				if(empty($person)){
					$educationalLevel = Person::create([
						'identification_number' => $item->identification_number_person,
						'business_name' => $item->business_name_person,
						'first_name' => $item->first_name_person,
						'first_surname' => $item->first_surname_person,
						'gender' => $item->gender_person,
						'civil_status' => $item->civil_status_person,
						'status' =>  $item->status_person,
						'home_phone' => $item->home_phone_person,
						'cell_phone' => $item->cell_phone_person,
						'home_email' => $item->home_email_person,
						'city_birth_id' => $municipality->id,
  						'disability_id' => isset($disability) ? $disability->id : NULL,
  						'educational_level_id' => $educationalLevel->id,
  						'type_identification_id' => $typeIdentification->id
 					]);
				}

				$person = Person::where('identification_number','=',$item->identification_number_person)
				->first();
				if(empty($person)){
					$educationalLevel = Person::create([
						'identification_number' => $item->identification_number_person,
						'business_name' => $item->business_name_person,
						'first_name' => $item->first_name_person,
						'first_surname' => $item->first_surname_person,
						'gender' => $item->gender_person,
						'civil_status' => $item->civil_status_person,
						'status' =>  $item->status_person,
						'home_phone' => $item->home_phone_person,
						'cell_phone' => $item->cell_phone_person,
						'home_email' => $item->home_email_person,
						'city_birth_id' => $municipality->id,
  						'disability_id' => isset($disability) ? $disability->id : NULL,
  						'educational_level_id' => $educationalLevel->id,
  						'type_identification_id' => $typeIdentification->id
 					]);
				}

				$currency = Currency::where('name','=',$item->currency_name_community)->first();
				if(empty($currency)){
					$currency = Currency::create(['name' => $item->currency_name_community]);
				}

				$country = Country::where('code','=',$item->country_code_community)->first();
				if(empty($country)){
					$country = Country::create([
						'code' => $item->country_code_community, 
						'name' => $item->country_name_community, 
						'language' => $item->country_language_community, 
						'currency_id' => $currency->id
					]);
				}

				$state = State::where('code','=',$item->state_code_community)->first();
				if(empty($state)){
					$state = State::create([
						'code' => $item->state_code_community, 
						'name' => $item->state_name_community, 
						'area_code' => $item->state_area_code_community, 
						'country_id' => $country->id
					]);
				}

				$municipality = Municipality::where('code','=',$item->municipality_code_community)->first();
				if(empty($municipality)){
					$municipality = Municipality::create([
						'code' => $item->municipality_code_community, 
						'name' => $item->municipality_name_community, 
						'state_id' => $state->id
					]);
				}

				$typeCommunity = TypeCommunity::where('name','=',$item->type_community_name)
				->first();
				if(empty($typeCommunity)){
					$typeCommunity = TypeCommunity::create([
						'name' => $item->type_community_name
					]);
				}

				$community = Community::where('nit','=',$item->nit_community)
				->first();
				if(empty($community)){
					$community = Community::create([
						'nit' => $item->nit_community, 
					    'name' => $item->name_community, 
					    'home_phone' => $item->home_phone_community,
					    'cell_phone' => $item->cell_phone_community,
					    'home_email' => $item->home_email_community,
					    'address' => $item->address_community,
					    'status' => $item->status_community,
					    'opening_date' => $item->opening_date_community,
					    'cancellation_date' => $item->cancellation_date_community,
					    'municipality_id' => $municipality->id,
					    'type_community_id' => $typeCommunity->id
					]);
				}

				$typeProperty = TypeProperty::where('name','=',$item->type_property_name)
				->first();
				if(empty($typeProperty)){
					$typeProperty = TypeProperty::create([
						'name' => $item->type_property_name
					]);
				}

				$property = Property::where('registration_number','=',$item->registration_number_property)
				->first();
				if(empty($property)){
					$property = Property::create([
						'description' => $item->description_property,
						'number' => $item->number_property,
						'area' => $item->area_property,
						'registration_number' => $item->registration_number_property,
						'date_construction' => $item->date_construction_property,
						'status' => $item->status_property,
						'type_contract' => $item->type_contract_property,
						'type_property_id' => $typeProperty->id,
						'community_id' => $community->id,
						'person_id' => $person->id
					]);
				}
			}
		});
	}
}
