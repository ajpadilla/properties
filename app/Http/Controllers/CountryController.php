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

    public function showList()
    {
        return view('countries.index');
    }

	public function store(CreateCountryRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
            $input['currency_id'] = $request->input('currency_related.value');
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
            if (empty($country)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Country not found');
                return $this->getResponseArrayJson();
            }
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
            $input['currency_id'] = $request->input('currency_related.value');
            $country = Country::find($id);
            if (empty($country)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Country not found');
                return $this->getResponseArrayJson();
            }
            $country->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $country);
            $this->addToResponseArray('message', 'Country successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $country = Country::find($id);
            if (empty($country)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Country not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($country->delete());
            $this->addToResponseArray('message', 'Country delete');
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
                Country::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
