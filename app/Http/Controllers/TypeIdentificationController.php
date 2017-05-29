<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeIdentification;
use App\Http\Requests\CreateTypeIdentificationRequest;
use App\Http\Requests\UpdateTypeIdentificationRequest;

class TypeIdentificationController extends Controller
{
 
 	public function index(Request $request)
    {
    	if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('types_identifications', $sortCol)) {
                $query = TypeIdentification::orderBy($sortCol, $sortDir);
            }else{
                $query = TypeIdentification::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = TypeIdentification::orderBy('created_at', 'asc');
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
        return view('typeIdentifications.index');
    }

    public function store(CreateTypeIdentificationRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typeIdentification = TypeIdentification::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typeIdentification);
            $this->addToResponseArray('message', 'Type of identification successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeIdentification = TypeIdentification::find($id);
            if (empty($typeIdentification)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Type of identification not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of identification successfully recovered');
            $this->addToResponseArray('data', $typeIdentification);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypeIdentificationRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typeIdentification = TypeIdentification::find($id);
            if (empty($typeIdentification)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Type of identification not found');
                return $this->getResponseArrayJson();
            }
            $typeIdentification->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typeIdentification);
            $this->addToResponseArray('message', 'Type of identification successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeIdentification = TypeIdentification::find($id);
            if (empty($typeIdentification)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Type of identification not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($typeIdentification->delete());
            $this->addToResponseArray('message', 'Type of identification delete');
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
                TypeIdentification::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }



}
