<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;
use App\Http\Requests\CreateInterestRequest;
use App\Http\Requests\UpdateInterestRequest;

class InterestController extends Controller
{
	
    public function index(Request $request)
    {
        if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('interests', $sortCol)) {
                $query = Interest::orderBy($sortCol, $sortDir);
            }else{
                $query = Interest::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = Interest::orderBy('created_at', 'asc');
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
        return view('interests.index');
    }

    public function store(CreateInterestRequest $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $interest = Interest::create($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $interest);
            $this->addToResponseArray('message', 'Interest successfully added');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $interest = Interest::find($id);
            if (empty($interest)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Interest not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Interest successfully recovered');
            $this->addToResponseArray('data', $interest);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateInterestRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $interest = Interest::find($id);
            if (empty($interest)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Interest not found');
                return $this->getResponseArrayJson();
            }
            $interest->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $interest);
            $this->addToResponseArray('message', 'Interest successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $interest = Interest::find($id);
            if (empty($interest)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Interest not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($interest->delete());
            $this->addToResponseArray('message', 'Interest successfully delete');
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
                Interest::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
