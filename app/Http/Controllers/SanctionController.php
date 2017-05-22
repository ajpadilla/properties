<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanction;
use App\Http\Requests\CreateSanctionRequest;
use App\Http\Requests\UpdateSanctionRequest;


class SanctionController extends Controller
{
  
  public function index(Request $request)
    {
        if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('sanctions', $sortCol)) {
                $query = Sanction::orderBy($sortCol, $sortDir);
            }else{
                $query = Sanction::sortBy($sortCol, $sortDir);
            }
        }else{
            $query = Sanction::orderBy('created_at', 'asc');
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
        return view('sanctions.index');
    }

    public function store(CreateSanctionRequest $request)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $sanction = Sanction::create($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $sanction);
            $this->addToResponseArray('message', 'Sanction successfully added');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $sanction = Sanction::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Sanction successfully recovered');
            $this->addToResponseArray('data', $sanction);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateSanctionRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $sanction = Sanction::find($id);
            $sanction->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $sanction);
            $this->addToResponseArray('message', 'Sanction successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $sanction = Sanction::find($id);
            $this->setSuccess($sanction->delete());
            $this->addToResponseArray('message', 'Sanction successfully delete');
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
                Sanction::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
