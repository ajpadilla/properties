<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeRepresentative;
use App\Http\Requests\CreateTypeRepresentativeRequest;
use App\Http\Requests\UpdateTypeRepresentativeRequest;

class TypeRepresentativeController extends Controller
{
  
  	public function index(Request $request)
    {
    	if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('types_representatives', $sortCol)) {
                $query = TypeRepresentative::orderBy($sortCol, $sortDir);
            }else{
                $query = TypeRepresentative::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = TypeRepresentative::orderBy('created_at', 'asc');
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
        return view('typeRepresentatives.index');
    }

    public function store(CreateTypeRepresentativeRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typeRepresentative = TypeRepresentative::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typeRepresentative);
            $this->addToResponseArray('message', 'Type of representative successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeRepresentative = TypeRepresentative::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of representative successfully recovered');
            $this->addToResponseArray('data', $typeRepresentative);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypeRepresentativeRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typeRepresentative = TypeRepresentative::find($id);
            $typeRepresentative->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typeRepresentative);
            $this->addToResponseArray('message', 'Type of representative successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeRepresentative = TypeRepresentative::find($id);
            $this->setSuccess($typeRepresentative->delete());
            $this->addToResponseArray('message', 'Type of representative delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }


}
