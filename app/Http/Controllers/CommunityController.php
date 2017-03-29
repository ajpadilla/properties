<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CreateCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;

class CommunityController extends Controller
{
 
 	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('communities', $sortCol)) {
				$query = Community::orderBy($sortCol, $sortDir);
			}else{
				$query = Community::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Community::orderBy('created_at', 'asc');
		}

		if($request->exists('filter')){
			$query->search("{$request->filter}");
		}

		$perPage = $request->has('per_page') ? (int) $request->per_page : null;
		$result = $query->paginate($perPage);

		return response()->json($result);
	}

    public function list()
    {
        return view('communities.index');
    }

	public function store(CreateCommunityRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
            $input['municipality_id'] = (int) $request->input('municipality_related.value');
            unset($input['municipality_related']);
            $input['type_community_id'] = (int) $request->input('type_community_related.value');
            unset($input['type_community_related']);
			$community = new Community;
			$community->nit = $input['nit'];
			$community->name = $input['name'];
			$community->home_phone = $input['home_phone'];
	    	$community->auxiliary_phone = $input['auxiliary_phone'];
	    	$community->cell_phone = $input['cell_phone'];
	    	$community->auxiliary_cell = $input['auxiliary_cell'];
	    	$community->home_email = $input['home_email'];
	    	$community->auxiliary_email = $input['auxiliary_email'];
	    	$community->address = $input['address'];
	    	$community->status = $input['status'];
	    	$community->opening_date = $input['opening_date'];
	    	$community->cancellation_date = $input['cancellation_date'];
	    	$community->reason_retiring = $input['reason_retiring'];
			$community->municipality_id = $input['municipality_id'];
			$community->type_community_id = $input['type_community_id'];
			$community->save();
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $community);
            $this->addToResponseArray('message', 'Community successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
	}

	public function show(Request $request, $id)
    {
    	if ($request->ajax()) {
            $community = Community::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Community successfully recovered');
            $this->addToResponseArray('data', $community);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateCommunityRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $input['municipality_id'] = (int) $request->input('municipality_related.value');
            unset($input['municipality_related']);
            $input['type_community_id'] = (int) $request->input('type_community_related.value');
            unset($input['type_community_related']);
            $community = Community::find($id);
            $community->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $community);
            $this->addToResponseArray('message', 'Community successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }


    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $community = Community::find($id);
            $this->setSuccess($community->delete());
            $this->addToResponseArray('message', 'Community successfully delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }



}
