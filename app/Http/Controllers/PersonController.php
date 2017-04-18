<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{

	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('persons', $sortCol)) {
				$query = Person::orderBy($sortCol, $sortDir);
			}else{
				$query = Person::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Person::orderBy('created_at', 'asc');
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
        return view('persons.index');
    }


}
