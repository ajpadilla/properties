<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{

	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('persons', $sortCol)) {
				$query = Person::orderBy($sortCol, $sortDir);
			}else{
				$query = Person::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Person::orderBy('created_at', 'asc');
		}

		if($request->exists('filter')){
			$query->search("{$request->filter}");
		}

		$perPage = $request->has('per_page') ? (int) $request->per_page : null;
		$result = $query->paginate($perPage);

		return response()->json($result);
	}

	public function showList()
    {
        return view('persons.index');
    }

    public function store(CreatePersonRequest $request)
    {
   		if ($request->ajax()) {
			$input = $request->all();
            $input['city_birth_id'] = $request->input('city_birth_related.value');
            unset($input['city_birth_related']);
            $input['disability_id'] = $request->input('disability_related.value');
            unset($input['disability_related']);
            $input['educational_level_id'] = $request->input('educational_level_related.value');
            unset($input['educational_level_related']);
            $input['type_identification_id'] = $request->input('type_identification_related.value');
            unset($input['type_identification_related']);
			//$person = Person::create($input);
            $person = new Person;
            $person->identification_number =  $input['identification_number'];
	  		$person->business_name = $input['business_name'];
	  		$person->first_name = $input['first_name'];
	  		$person->second_name = $input['second_name'];
	  		$person->first_surname = $input['first_surname'];
	  		$person->second_surname = $input['second_surname'];
	  		$person->home_phone = $input['home_phone'];
	  		$person->auxiliary_phone = $input['auxiliary_phone'];
	  		$person->cell_phone = $input['cell_phone'];
	  		$person->auxiliary_cell = $input['auxiliary_cell'];
	  		$person->home_email = $input['home_email'];
	  		$person->auxiliary_email = $input['auxiliary_email'];
	  		$person->correspondence_address = $input['correspondence_address'];
	  		$person->city_correspondence = $input['city_correspondence'];
	  		$person->country_correspondence = $input['country_correspondence'];
	  		$person->office_address = $input['office_address'];
	  		$person->city_office = $input['city_office'];
	  		$person->country_office = $input['country_office'];
	  		$person->birth_date = $input['birth_date'];
	  		$person->gender = $input['gender'];
	  		$person->civil_status = $input['civil_status'];
	  		$person->cod_labor_activity = $input['cod_labor_activity'];
	  		$person->admission_date = $input['admission_date'];
	  		$person->cancellation_date = $input['cancellation_date'];
	  		$person->status = $input['status'];
	  		$person->city_birth_id = $input['city_birth_id'];
	  		$person->disability_id = $input['disability_id'];
	  		$person->educational_level_id = $input['educational_level_id'];
	  		$person->type_identification_id = $input['type_identification_id'];
	  		$person->save();
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $input);
            $this->addToResponseArray('message', 'Person successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
    	if ($request->ajax()) {
            $person = Person::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Person successfully recovered');
            $this->addToResponseArray('data', $person);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdatePersonRequest $request)
    {
   		if ($request->ajax()) {
            $input = $request->all();
            $input['city_birth_id'] = $request->input('city_birth_related.value');
            unset($input['city_birth_related']);
            $input['disability_id'] = $request->input('disability_related.value');
            unset($input['disability_related']);
            $input['educational_level_id'] = $request->input('educational_level_related.value');
            unset($input['educational_level_related']);
            $input['type_identification_id'] = $request->input('type_identification_related.value');
            unset($input['type_identification_related']);
            $person = Person::find($id);
            $person->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $person);
            $this->addToResponseArray('message', 'Community successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

}
