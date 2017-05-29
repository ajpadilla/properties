<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EducationalLevel;
use App\Http\Requests\CreateEducationalLevelRequest;
use App\Http\Requests\UpdateEducationalLevelRequest;

class EducationalLevelController extends Controller
{
    public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('educational_levels', $sortCol)) {
				$query = EducationalLevel::orderBy($sortCol, $sortDir);
			}else{
				$query = EducationalLevel::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = EducationalLevel::orderBy('created_at', 'asc');
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
        return view('educationalLevels.index');
    }

    public function store(CreateEducationalLevelRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$educationalLevel = EducationalLevel::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $educationalLevel);
            $this->addToResponseArray('message', 'Educational level successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $educationalLevel = EducationalLevel::find($id);
            if (empty($educationalLevel)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Educational level not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Educational level successfully recovered');
            $this->addToResponseArray('data', $educationalLevel);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateEducationalLevelRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $educationalLevel = EducationalLevel::find($id);
            if (empty($educationalLevel)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Educational level not found');
                return $this->getResponseArrayJson();
            }
            $educationalLevel->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $educationalLevel);
            $this->addToResponseArray('message', 'Educational level successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $educationalLevel = EducationalLevel::find($id);
            if (empty($educationalLevel)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Educational level not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($educationalLevel->delete());
            $this->addToResponseArray('message', 'Educational level delete');
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
                EducationalLevel::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
