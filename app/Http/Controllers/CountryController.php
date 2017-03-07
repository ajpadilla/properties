<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CreateCountryRequest;
use App\Http\Requests\UpdateCountryRequest;

class CountryController extends Controller
{
	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('countries', $sortCol)) {
				$query = Currency::orderBy($sortCol, $sortDir);
			}else{
				$query = Currency::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Currency::orderBy('created_at', 'asc');
		}

		if($request->exists('filter')){
			$query->search("{$request->filter}");
		}

		$perPage = $request->has('per_page') ? (int) $request->per_page : null;
		$result = $query->paginate($perPage);

		return response()->json($result);
	}

	public function store(CreateCountryRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
			$country = Country::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $country);
            $this->addToResponseArray('message', 'Country successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
	}

}
