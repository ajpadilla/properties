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
				$query = Country::orderBy($sortCol, $sortDir);
			}else{
				$query = Country::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Country::orderBy('created_at', 'asc');
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

	public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $country = Country::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Country successfully recovered');
            $this->addToResponseArray('data', $country);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateCountryRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $country = Country::find($id);
            $country->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $country);
            $this->addToResponseArray('message', 'Country successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

}