<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Http\Requests\CreateCommunityRequest;
use App\Http\Requests\UpdateCommunityRequest;
use App\Models\CommunityPhoto;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CommunityController extends Controller
{
 
 	public function index(Request $request)
	{
		if ($request->has('sort')) {
			list($sortCol, $sortDir) = explode('|', $request->sort);
			if (\Schema::hasColumn('communities', $sortCol)) {
				$query = Community::orderBy($sortCol, $sortDir);
			}else{
				$query = Community::sortBy($sortCol, $sortDir);
			}
		}else{
			$query = Community::orderBy('created_at', 'asc');
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
        return view('communities.index');
    }

	public function store(CreateCommunityRequest $request)
	{
		if ($request->ajax()) {
			$input = $request->all();
            $input['municipality_id'] = (int) $request->input('municipality_related.value');
            unset($input['municipality_related']);
            $input['type_community_id'] = (int) $request->input('type_community_related.value');
            unset($input['type_community_related']);
            $community = Community::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $community);
            $this->addToResponseArray('message', 'Community successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
	}

	public function show(Request $request, $id)
    {
    	if ($request->ajax()) {
            $community = Community::find($id);
            if (empty($community)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Community not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Community successfully recovered');
            $this->addToResponseArray('data', $community);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateCommunityRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $input['municipality_id'] = (int) $request->input('municipality_related.value');
            unset($input['municipality_related']);
            $input['type_community_id'] = (int) $request->input('type_community_related.value');
            unset($input['type_community_related']);
            $community = Community::find($id);
            if (empty($community)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Community not found');
                return $this->getResponseArrayJson();
            }
            $community->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $community);
            $this->addToResponseArray('message', 'Community successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }


    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $community = Community::find($id);
            if (empty($community)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Community not found');
                return $this->getResponseArrayJson();
            }
            $this->setSuccess($community->delete());
            $this->addToResponseArray('message', 'Community successfully delete');
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
                Community::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }


    public function addPhoto(Request $request, $communityId)
    {
        if ($request->hasFile('file')) 
        {
            $data = [];
            $community = Community::find($communityId);
            if ($community) {
                $data['community_id'] = $communityId;
                $communityPhoto = new CommunityPhoto;
                $communityPhoto->register($request->file('file'),
                    'storage/communities/community_'.$communityId.'_photos/',
                    $data
                );
                $this->setSuccess(true);
                $this->addToResponseArray('communityPhoto', $communityPhoto);
                return $this->getResponseArrayJson(); 
            } 
            return $this->getResponseArrayJson(); 
        }   
        return $this->getResponseArrayJson();  
    }   

    public function totalBriefcaseForProperties(Request $request, $id)
    {
        if ($request->ajax()) 
        {
            $honorarium = 0;
            $total_capital = 0;
            $total_sanction = 0;
            $total_interest = 0;
            $total_debt = 0;
            $positive_balance = 0;
            $debt_height = 0;

            $dt = Carbon::now();

            $community = Community::find($id);

            $properties = $community->properties()->get();

            if (empty($properties)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'The community does not have an associated properties');
                return $this->getResponseArrayJson();
            }

           foreach ($properties as $property) 
           {
                $briefcases = $property->briefcases()
                ->whereYear('date_cut', $dt->year)
                ->orderBy('date_cut','asc')
                ->get();

                if (!empty($briefcases)) 
                {
                    $honorarium += $briefcases->sum('honorarium');
                    $total_capital += $briefcases->sum('total_capital'); 
                    $total_sanction += $briefcases->sum('total_sanction');
                    $total_interest += $briefcases->sum('total_interest'); 
                    $total_debt += $briefcases->sum('total_debt');
                    $positive_balance += $briefcases->sum('positive_balance');
                    $debt_height += $briefcases->sum('debt_height');
                }
            }

            $totalsBriefcases [] = [
                'honorarium' => $honorarium,
                'total_capital' => $total_capital, 
                'total_sanction' => $total_sanction,
                'total_interest' => $total_interest, 
                'total_debt' => $total_debt,
                'positive_balance' => $positive_balance,
                'debt_height' => $debt_height
            ];

            Excel::create('Laravel Excel', function($excel)  use ($totalsBriefcases) {

                $excel->sheet('Total briefcases', function($sheet) use ($totalsBriefcases) {

                    $sheet->fromArray($totalsBriefcases);

                });
            })->export('xls');
        }
    }
}
