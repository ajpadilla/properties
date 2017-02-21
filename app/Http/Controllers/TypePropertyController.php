<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProperty;
use App\Http\Requests\CreateTypePropertyRequest;

class TypePropertyController extends Controller
{

    public function index(Request $request)
    {
    	return response()->json(TypeProperty::paginate(2));
    }

    public function store(CreateTypePropertyRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		TypeProperty::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $input);
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }
}
