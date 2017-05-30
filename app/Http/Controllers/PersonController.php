<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Requests\CreatePersonRequest;
use App\Http\Requests\UpdatePersonRequest;
use App\Models\PersonPhoto;

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
			$person = Person::create($input);
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
            if (empty($person)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Person not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Person successfully recovered');
            $this->addToResponseArray('data', $person);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdatePersonRequest $request, $id)
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
            if (empty($person)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Person not found');
                return $this->getResponseArrayJson();
            }
            $person->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $person);
            $this->addToResponseArray('message', 'Person successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $person = Person::find($id);
            if (empty($person)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Person not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($person->delete());
            $this->addToResponseArray('message', 'Person successfully delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    public function selectList(Request $request)
    {
        if ($request->ajax())
        {   
            $persons = Person::all()->pluck('full_name', 'id');
            $this->setSuccess(true);
            $this->addToResponseArray('data', $persons);
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    public function addPhoto(Request $request, $personId)
    {
        if ($request->hasFile('file')) 
        {
            $data = [];
            $person = Person::find($personId);
            if($person){
            	$data['person_id'] = $personId;
            	$personPhoto = new PersonPhoto;
            	$personPhoto->register($request->file('file'),
                    'storage/persons/person_'.$personId.'_photos/',
                    $data
                );
            	$this->setSuccess(true);
            	$this->addToResponseArray('personPhoto', $personPhoto);
            	return $this->getResponseArrayJson();
            }
           	return $this->getResponseArrayJson();  
        }   
        return $this->getResponseArrayJson();  
    } 

}
