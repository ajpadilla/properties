<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use App\Http\Requests\CreateCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;

class CurrencyController extends Controller
{	
	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('currencies', $sortCol)) {
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

    public function store(CreateCurrencyRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
    		$currency = Currency::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $currency);
            $this->addToResponseArray('message', 'Currency successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $currency = Currency::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Currency successfully recovered');
            $this->addToResponseArray('data', $currency);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateCurrencyRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $currency = Currency::find($id);
            $currency->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $currency);
            $this->addToResponseArray('message', 'Currency successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $currency = Currency::find($id);
            $this->setSuccess($currency->delete());
            $this->addToResponseArray('message', 'Currency delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }
}
