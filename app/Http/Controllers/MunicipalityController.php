<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipality;
use App\Models\State;
use App\Http\Requests\CreateMunicipalityRequest;
use App\Http\Requests\UpdateMunicipalityRequest;

class MunicipalityController extends Controller
{

	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('municipalities', $sortCol)) {
				$query = Municipality::orderBy($sortCol, $sortDir);
			}else{
				$query = Municipality::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Municipality::orderBy('created_at', 'asc');
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
        return view('municipalities.index');
    }

	public function store(CreateMunicipalityRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
            $input['state_id'] = $request->input('state_related.value');
			$municipality = Municipality::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $municipality);
            $this->addToResponseArray('message', 'Municipality successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
	}

	public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $municipality = Municipality::find($id);
            if (empty($municipality)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Municipality not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Municipality successfully recovered');
            $this->addToResponseArray('data', $municipality);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateMunicipalityRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $input['state_id'] = $request->input('state_related.value');
            $municipality = Municipality::find($id);
             if (empty($municipality)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Municipality not found');
                return $this->getResponseArrayJson();
            }
            $municipality->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $municipality);
            $this->addToResponseArray('message', 'Municipality successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $municipality = Municipality::find($id);
            if (empty($municipality)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Municipality not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($municipality->delete());
            $this->addToResponseArray('message', 'Municipality delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    
    public function selectList(Request $request)
    {
        if ($request->ajax())
        {   
            $this->setSuccess(true);
            $this->addToResponseArray('data', 
                Municipality::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    public function byState(Request $request, $stateId)
    {
        if($request->ajax()){
            $state = State::find($stateId);
            if (empty($state)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'State not found');
                return $this->getResponseArrayJson();
            }
            $municipalities = $state->municipalities->pluck('name', 'id')->toArray();
            $this->addToResponseArray('data', $municipalities);
            $this->setSuccess(true);
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
