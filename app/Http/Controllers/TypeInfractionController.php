<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeInfraction;
use App\Http\Requests\CreateTypeInfractionRequest;
use App\Http\Requests\UpdateTypeInfractionRequest;

class TypeInfractionController extends Controller
{
 	public function index(Request $request)
    {
    	if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('types_infractions', $sortCol)) {
                $query = TypeInfraction::orderBy($sortCol, $sortDir);
            }else{
                $query = TypeInfraction::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = TypeInfraction::orderBy('created_at', 'asc');
        }

        if($request->exists('filter')){
            $query->search("{$request->filter}");
        }

        $perPage = $request->has('per_page') ? (int) $request->per_page : null;
        $result = $query->paginate($perPage);

        return response()->json($result);

    }

    public function store(CreateTypeInfractionRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typeInfraction = TypeInfraction::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typeInfraction);
            $this->addToResponseArray('message', 'Type of infraction successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeInfraction = TypeInfraction::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of infraction successfully recovered');
            $this->addToResponseArray('data', $typeInfraction);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypeInfractionRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typeInfraction = TypeInfraction::find($id);
            $typeInfraction->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typeInfraction);
            $this->addToResponseArray('message', 'Type of infraction successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeInfraction = TypeInfraction::find($id);
            $this->setSuccess($typeInfraction->delete());
            $this->addToResponseArray('message', 'Type of infraction delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }
}
