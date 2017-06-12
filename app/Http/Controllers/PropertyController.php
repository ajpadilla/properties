<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection as Collection;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\PropertyPhoto;
use App\Models\Community;
use Carbon\Carbon;

class PropertyController extends Controller
{


	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('properties', $sortCol)) {
				$query = Property::orderBy($sortCol, $sortDir);
			}else{
				$query = Property::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Property::orderBy('created_at', 'asc');
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
		return view('properties.index');
	}

	public function store(CreatePropertyRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
			$input['type_property_id'] = $request->input('type_property_related.value');
			unset($input['type_property_related']);
			$input['community_id'] = $request->input('community_related.value');
			unset($input['community_related']);
			$input['person_id'] = $request->input('person_related.value');
			unset($input['person_related']);
			$property = Property::create($input);
			$this->setSuccess(true);
			$this->addToResponseArray('data', $property);
			$this->addToResponseArray('message', 'Property successfully added');
			return $this->getResponseArrayJson();
		}
		return $this->getResponseArrayJson();
	}

	public function show(Request $request, $id)
    {
    	if ($request->ajax()) {
            $property = Property::find($id);
            if (empty($property)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Property not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Property successfully recovered');
            $this->addToResponseArray('data', $property);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdatePropertyRequest $request, $id)
    {
   		if ($request->ajax()) {
			$input = $request->all();
			$input['type_property_id'] = $request->input('type_property_related.value');
			unset($input['type_property_related']);
			$input['community_id'] = $request->input('community_related.value');
			unset($input['community_related']);
			$input['person_id'] = $request->input('person_related.value');
			unset($input['person_related']);
			$property = Property::find($id);
            if (empty($property)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Property not found');
                return $this->getResponseArrayJson();
            }
			$property->update($input);
			$this->setSuccess(true);
			$this->addToResponseArray('data', $property);
			$this->addToResponseArray('message', 'Property successfully update');
			return $this->getResponseArrayJson();
		}
		return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $property = Property::find($id);
            if (empty($property)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Property not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($property->delete());
            $this->addToResponseArray('message', 'Property successfully delete');
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
                Property::all()->pluck('number', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    public function addPhoto(Request $request, $propertyId)
    {
        if ($request->hasFile('file')) 
        {
            $data = [];
            $property = Property::find($propertyId);
            if($property){
            	$data['property_id'] = $propertyId;
            	$propertyPhoto = new PropertyPhoto;
            	$propertyPhoto->register($request->file('file'), 
                    'storage/properties/property_'.$propertyId.'_photos/',
            		$data);
            	$this->setSuccess(true);
            	$this->addToResponseArray('propertyPhoto', $propertyPhoto);
            	return $this->getResponseArrayJson();
            }
           	return $this->getResponseArrayJson();  
        }   
        return $this->getResponseArrayJson();  
    } 

    public function byCommunity(Request $request, $communityId)
    {
        if($request->ajax()){
            $community = Community::find($communityId);
            if (empty($community)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Community not found');
                return $this->getResponseArrayJson();
            }
            $properties = $community->properties->pluck('number', 'id')->toArray();
            $this->addToResponseArray('data', $properties);
            $this->setSuccess(true);
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    public function currentBriefcaseTotal(Request $request, $id)
    {
        $totalsBriefcases = [];

        $dt = Carbon::now();

        $property = Property::find($id);

        if (empty($property)) {
            $this->setSuccess(false);
            $this->addToResponseArray('message', 'Property not found');
            return $this->getResponseArrayJson();
        }

        $briefcases = $property->briefcases()->whereYear('date_cut', $dt->year)->get();

        if (empty($briefcases)) {
            $this->setSuccess(false);
            $this->addToResponseArray('message', 'The property does not have an associated briefcases');
            return $this->getResponseArrayJson();
        }

        $totalsBriefcases [] = [
        'honorarium' => $briefcases->sum('honorarium'),
        'total_capital' => $briefcases->sum('total_capital'), 
        'total_sanction' => $briefcases->sum('total_sanction'),
        'total_interest' => $briefcases->sum('total_interest'), 
        'total_debt' => $briefcases->sum('total_debt'),
        'positive_balance' => $briefcases->sum('positive_balance'),
        'debt_height' => $briefcases->sum('debt_height')
        ];

        Excel::create('Laravel Excel', function($excel)  use ($totalsBriefcases) {

            $excel->sheet('Briefcase', function($sheet) use ($totalsBriefcases) {

                $sheet->fromArray($totalsBriefcases);

            });
        })->export('xls');
    }


}
