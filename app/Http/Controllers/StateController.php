<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use App\Http\Requests\CreateStateRequest;
use App\Http\Requests\UpdateStateRequest;

class StateController extends Controller
{

	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('states', $sortCol)) {
				$query = State::orderBy($sortCol, $sortDir);
			}else{
				$query = State::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = State::orderBy('created_at', 'asc');
		}

		if($request->exists('filter')){
			$query->search("{$request->filter}");
		}

		$perPage = $request->has('per_page') ? (int) $request->per_page : null;
		$result = $query->paginate($perPage);

		return response()->json($result);
	}

	public function store(CreateStateRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
            $input['country_id'] = $request->input('country_related.value');
			$state = State::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $state);
            $this->addToResponseArray('message', 'State successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
	}

	public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $state = State::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'State successfully recovered');
            $this->addToResponseArray('data', $state);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateStateRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $input['country_id'] = $request->input('country_related.value');
            $state = State::find($id);
            $state->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $state);
            $this->addToResponseArray('message', 'State successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $state = State::find($id);
            $this->setSuccess($state->delete());
            $this->addToResponseArray('message', 'State delete');
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
                State::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
