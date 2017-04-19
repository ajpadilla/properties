<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use App\Http\Requests\CreatePersonRequest;

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
            $input['disability_id'] = $request->input('disability_related.value');
            $input['educational_level_id'] = $request->input('educational_level_related.value');
            $input['type_identification_id'] = $request->input('type_identification_related.value');
			$person = Person::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $person);
            $this->addToResponseArray('message', 'Person successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
    }

}
