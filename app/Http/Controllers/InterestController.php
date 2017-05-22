<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interest;

class InterestController extends Controller
{
	
    public function index(Request $request)
    {
        if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);
            if (\Schema::hasColumn('briefcases', $sortCol)) {
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
