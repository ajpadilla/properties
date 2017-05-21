<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeAnimal;
use App\Http\Requests\CreateTypeAnimalRequest;
use App\Http\Requests\UpdateTypeAnimalRequest;

class TypeAnimalController extends Controller
{
	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('type_animals', $sortCol)) {
				$query = TypeAnimal::orderBy($sortCol, $sortDir);
			}else{
				$query = TypeAnimal::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = TypeAnimal::orderBy('created_at', 'asc');
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
        return view('typeAnimals.index');
    }

    public function store(CreateTypeAnimalRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$typeAnimal = TypeAnimal::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $typeAnimal);
            $this->addToResponseArray('message', 'Type of animal successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeAnimal = TypeAnimal::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Type of animal successfully recovered');
            $this->addToResponseArray('data', $typeAnimal);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateTypeAnimalRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $typeAnimal = TypeAnimal::find($id);
            $typeAnimal->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $typeAnimal);
            $this->addToResponseArray('message', 'Type of animal successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $typeAnimal = TypeAnimal::find($id);
            $this->setSuccess($typeAnimal->delete());
            $this->addToResponseArray('message', 'Type of animal delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }
}
