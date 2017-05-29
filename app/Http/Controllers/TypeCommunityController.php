<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCommunity;
use App\Http\Requests\CreateTypeCommunityRequest;
use App\Http\Requests\UpdateTypeCommunityRequest;

class TypeCommunityController extends Controller
{
   	public function index(Request $request)
    {
    	if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('types_communities', $sortCol)) {
                $query = TypeCommunity::orderBy($sortCol, $sortDir);
            }else{
                $query = TypeCommunity::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = TypeCommunity::orderBy('created_at', 'asc');
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
        return view('typeCommunities.index') ;
    }

    public function store(CreateTypeCommunityRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typeCommunity = TypeCommunity::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typeCommunity);
            $this->addToResponseArray('message', 'Type of community successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeCommunity = TypeCommunity::find($id);
            if (empty($typeCommunity)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Type of community not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of community successfully recovered');
            $this->addToResponseArray('data', $typeCommunity);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypeCommunityRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typeCommunity = TypeCommunity::find($id);
            if (empty($typeCommunity)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Type of community not found');
                return $this->getResponseArrayJson();
            }
            $typeCommunity->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typeCommunity);
            $this->addToResponseArray('message', 'Type of community successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeCommunity = TypeCommunity::find($id);
            if (empty($typeCommunity)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Type of community not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($typeCommunity->delete());
            $this->addToResponseArray('message', 'Type of community delete');
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
                TypeCommunity::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
