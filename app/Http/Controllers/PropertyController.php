<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\CreatePropertyRequest;

class PropertyController extends Controller
{
    

	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('properties', $sortCol)) {
				$query = Property::orderBy($sortCol, $sortDir);
			}else{
				$query = Property::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Property::orderBy('created_at', 'asc');
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
        return view('properties.index');
    }

    public function store(CreatePropertyRequest $request){
    	if ($request->ajax()) {
    		$input = $request->all();
    		$input['type_property_id'] = $request->input('type_property_related.value');
    		unset($input['type_property_related']);
    		$input['community_id'] = $request->input('community_related.value');
    		unset($input['community_related']);
    		$input['person_id'] = $request->input('person_related.value');
    		unset($input['person_related']);
    		$property = Property::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $property);
    		$this->addToResponseArray('message', 'Property successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }


}
