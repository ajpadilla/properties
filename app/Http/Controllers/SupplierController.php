<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;

class SupplierController extends Controller
{
  
  	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('suppliers', $sortCol)) {
				$query = Supplier::orderBy($sortCol, $sortDir);
			}else{
				$query = Supplier::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Supplier::orderBy('created_at', 'asc');
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
        return view('suppliers.index');
    }

    public function store(CreateSupplierRequest $request)
    {
    	if ($request->ajax()) {
   			$input = $request->all();
   			$input['type_identification_id'] = $request->input('type_identification_related.value');
			unset($input['type_identification_related']);
    		$supplier = Supplier::create($input);
    		$this->setSuccess(true);
    		$this->addToResponseArray('data', $supplier);
            $this->addToResponseArray('message', 'Supplier successfully added');
    		return $this->getResponseArrayJson();
    	}
    	return $this->getResponseArrayJson();
    }


    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            $supplier = Supplier::find($id);
            if (empty($supplier)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Suppliernot found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Supplier successfully recovered');
            $this->addToResponseArray('data', $supplier);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function update(UpdateSupplierRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $supplier = Supplier::find($id);
            if (empty($supplier)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Supplier not found');
                return $this->getResponseArrayJson();
            }
            $supplier->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $supplier);
            $this->addToResponseArray('message', 'Supplier successfully update');
            return $this->getResponseArrayJson();
       }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $supplier = Supplier::find($id);
            if (empty($supplier)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Supplier not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($supplier->delete());
            $this->addToResponseArray('message', 'Supplier delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
