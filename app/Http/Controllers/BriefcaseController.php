<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Briefcase;
use App\Http\Requests\CreateBreafcaseRequest;
use App\Http\Requests\UpdateBreafcaseRequest;


class BriefcaseController extends Controller
{
 
 	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('briefcases', $sortCol)) {
				$query = Briefcase::orderBy($sortCol, $sortDir);
			}else{
				$query = Briefcase::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Briefcase::orderBy('created_at', 'asc');
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
        return view('briefcases.index');
    }

    public function store(CreateBreafcaseRequest $request)
    {
    	if ($request->ajax()) {
			$input = $request->all();
            $input['property_id'] = (int) $request->input('property_related.value');
            unset($input['property_related']);
            $briefcase = Briefcase::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $briefcase);
            $this->addToResponseArray('message', 'Briefcase successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
    	if ($request->ajax()) {
            $briefcase = Briefcase::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Briefcase successfully recovered');
            $this->addToResponseArray('data', $briefcase);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateBreafcaseRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $input['property_id'] = (int) $request->input('property_related.value');
            unset($input['property_related']);
            $briefcase = Briefcase::find($id);
            $briefcase->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $briefcase);
            $this->addToResponseArray('message', 'Briefcase successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $briefcase = Briefcase::find($id);
            $this->setSuccess($briefcase->delete());
            $this->addToResponseArray('message', 'Briefcase successfully delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }


}
