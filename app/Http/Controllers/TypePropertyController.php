<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProperty;
use App\Http\Requests\CreateTypePropertyRequest;
use App\Http\Requests\UpdateTypePropertyRequest;

class TypePropertyController extends Controller
{

    public function index(Request $request)
    {
    	return response()->json(TypeProperty::paginate(10));
    }

    public function store(CreateTypePropertyRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typeProperty = TypeProperty::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typeProperty);
            $this->addToResponseArray('message', 'Type of property successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeProperty = TypeProperty::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of property successfully recovered');
            $this->addToResponseArray('data', $typeProperty);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypePropertyRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typeProperty = TypeProperty::find($id);
            $typeProperty->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typeProperty);
            $this->addToResponseArray('message', 'Type of property successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeProperty = TypeProperty::find($id);
            $this->setSuccess($typeProperty->delete());
            $this->addToResponseArray('message', 'Type of property delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }
}
