<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypePqr;
use App\Http\Requests\CreateTypePqrRequets;
use App\Http\Requests\UpdateTypePqrRequets;

class TypePqrController extends Controller
{
 
 	public function index(Request $request)
    {
    	if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('types_pqr', $sortCol)) {
                $query = TypePqr::orderBy($sortCol, $sortDir);
            }else{
                $query = TypePqr::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = TypePqr::orderBy('created_at', 'asc');
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
        return view('typePqr.index');
    }

    public function store(CreateTypePqrRequets $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typePqr = TypePqr::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typePqr);
            $this->addToResponseArray('message', 'Type of pqr successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typePqr = TypePqr::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of pqr successfully recovered');
            $this->addToResponseArray('data', $typePqr);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypePqrRequets $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typePqr = TypePqr::find($id);
            $typePqr->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typePqr);
            $this->addToResponseArray('message', 'Type of pqr successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typePqr = TypePqr::find($id);
            $this->setSuccess($typePqr->delete());
            $this->addToResponseArray('message', 'Type of pqr delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
