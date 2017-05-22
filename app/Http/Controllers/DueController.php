<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Due;
use App\Http\Requests\CreateDueRequest;
use App\Http\Requests\UpdateDueRequest;


class DueController extends Controller
{

  public function index(Request $request)
    {
        if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('dues', $sortCol)) {
                $query = Due::orderBy($sortCol, $sortDir);
            }else{
                $query = Due::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = Due::orderBy('created_at', 'asc');
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
        return view('dues.index');
    }

    public function store(CreateDueRequest $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $due = Due::create($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $due);
            $this->addToResponseArray('message', 'Due successfully added');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $due = Due::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Due successfully recovered');
            $this->addToResponseArray('data', $due);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateDueRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $due = Due::find($id);
            $due->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $due);
            $this->addToResponseArray('message', 'Due successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $due = Due::find($id);
            $this->setSuccess($due->delete());
            $this->addToResponseArray('message', 'Due successfully delete');
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
                Due::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
