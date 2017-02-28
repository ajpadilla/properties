<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disability;
use App\Http\Requests\CreateDisabilityRequest;
use App\Http\Requests\UpdateDisabilityRequest;

class DisabilityController extends Controller
{
 	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('disabilities', $sortCol)) {
				$query = Disability::orderBy($sortCol, $sortDir);
			}else{
				$query = Disability::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Disability::orderBy('created_at', 'asc');
		}

		if($request->exists('filter')){
			$query->search("{$request->filter}");
		}

		$perPage = $request->has('per_page') ? (int) $request->per_page : null;
		$result = $query->paginate($perPage);

		return response()->json($result);
	}

	public function store(CreateDisabilityRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$disability = Disability::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $disability);
            $this->addToResponseArray('message', 'Disability successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $disability = Disability::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Disability successfully recovered');
            $this->addToResponseArray('data', $disability);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateDisabilityRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $disability = Disability::find($id);
            $disability->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $disability);
            $this->addToResponseArray('message', 'Disability successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $disability = Disability::find($id);
            $this->setSuccess($disability->delete());
            $this->addToResponseArray('message', 'Disability delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }
}
