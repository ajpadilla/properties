<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Briefcase;

class BriefcaseController extends Controller
{
 
 	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('briefcases', $sortCol)) {
				$query = Briefcase::orderBy($sortCol, $sortDir);
			}else{
				$query = Briefcase::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Briefcase::orderBy('created_at', 'asc');
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
        return view('briefcases.index');
    }


}
