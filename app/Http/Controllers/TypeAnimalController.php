<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeAnimal;

class TypeAnimalController extends Controller
{
	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('type_properties', $sortCol)) {
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
}
