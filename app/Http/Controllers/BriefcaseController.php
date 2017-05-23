<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Briefcase;
use App\Models\Interest;
use App\Models\Sanction;
use App\Models\Due;
use App\Http\Requests\CreateBreafcaseRequest;
use App\Http\Requests\UpdateBreafcaseRequest;
use App\Http\Requests\RelationDueBriefcaseRequest;
use App\Http\Requests\RelationInterestBriefcaseRequest;
use App\Http\Requests\RelationSanctionBriefcaseRequest;

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

	public function showList()
    {
        return view('briefcases.index');
    }

    public function store(CreateBreafcaseRequest $request)
    {
    	if ($request->ajax()) {
			$input = $request->all();
            $input['property_id'] = (int) $request->input('property_related.value');
            unset($input['property_related']);
            $briefcase = Briefcase::create($input);
			$this->setSuccess(true);
    		$this->addToResponseArray('data', $briefcase);
            $this->addToResponseArray('message', 'Briefcase successfully added');
    		return $this->getResponseArrayJson();
		}
    	return $this->getResponseArrayJson();
    }

    public function show(Request $request, $id)
    {
    	if ($request->ajax()) {
            $briefcase = Briefcase::find($id);
            $this->setSuccess(true);
            $this->addToResponseArray('message', 'Briefcase successfully recovered');
            $this->addToResponseArray('data', $briefcase);
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();   
    }

    public function update(UpdateBreafcaseRequest $request, $id)
    {
        if ($request->ajax()) {
            $input = $request->all();
            $input['property_id'] = (int) $request->input('property_related.value');
            unset($input['property_related']);
            $briefcase = Briefcase::find($id);
            $briefcase->update($input);
            $this->setSuccess(true);
            $this->addToResponseArray('data', $briefcase);
            $this->addToResponseArray('message', 'Briefcase successfully update');
            return $this->getResponseArrayJson();
        }
        return $this->getResponseArrayJson();
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            $briefcase = Briefcase::find($id);
            $this->setSuccess($briefcase->delete());
            $this->addToResponseArray('message', 'Briefcase successfully delete');
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

    public function storeInterest(RelationInterestBriefcaseRequest $request, $id = null )
    {
        if ($request->ajax()) 
        {

            $briefcase = Briefcase::find($id);

            if (empty($briefcase)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Briefcase not found');
                return $this->getResponseArrayJson();
            }

            $interestId = (int) $request->input('interest_related.value'); 

            $interest = Interest::find($interestId);

            if (empty($interest)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Interest not found');
                return $this->getResponseArrayJson();
            }

            $input = $request->all();


            $exists = $briefcase->interests()->whereInterestId($interestId);

            if ($exists) {
                $briefcase->interests()->updateExistingPivot($interestId, 
                    ['percent' => $request->input('interest.percent')]
                    );
                $this->setSuccess(true);
                $this->addToResponseArray('message', 'Interest successfully updated to briefcase');
                $this->addToResponseArray('data', $input);
                return $this->getResponseArrayJson(); 
            }else{
                $briefcase->interests()->attach($interestId, 
                    ['percent' => $request->input('interest.percent')]
                    );
                $this->setSuccess(true);
                $this->addToResponseArray('message', 'Interest correctly associated with briefcase');
                $this->addToResponseArray('data', $input);
                return $this->getResponseArrayJson(); 
            }
        }
        return $this->getResponseArrayJson(); 
    }


    public function storeSanction(RelationSanctionBriefcaseRequest $request, $id = null )
    {
        if ($request->ajax()) 
        {

            $briefcase = Briefcase::find($id);

            if (empty($briefcase)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Briefcase not found');
                return $this->getResponseArrayJson();
            }

            $sanctionId = (int) $request->input('sanction_related.value'); 

            $sanction = Sanction::find($sanctionId);

            if (empty($sanction)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Sanction not found');
                return $this->getResponseArrayJson();
            }

            $input = $request->all();

            $exists = $briefcase->sanctions()->whereSanctionId($sanctionId);

            if ($exists) {
                $briefcase->sanctions()->updateExistingPivot($sanctionId, 
                    ['amount' => $request->input('sanction.amount')]
                );
                $this->setSuccess(true);
                $this->addToResponseArray('message', 'Sanction successfully updated to briefcase');
                $this->addToResponseArray('data', $input);
                return $this->getResponseArrayJson(); 
            }else{
                $briefcase->sanctions()->attach($sanctionId, 
                    ['amount' => $request->input('sanction.amount')]
                );
                $this->setSuccess(true);
                $this->addToResponseArray('message', 'Sanction correctly associated with briefcase');
                $this->addToResponseArray('data', $input);
                return $this->getResponseArrayJson(); 
            }
        }
        return $this->getResponseArrayJson(); 
    }

    public function storeDue(RelationDueBriefcaseRequest $request, $id = null )
    {
        if ($request->ajax()) 
        {

            $briefcase = Briefcase::find($id);

            if (empty($briefcase)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Briefcase not found');
                return $this->getResponseArrayJson();
            }

            $dueId = (int) $request->input('due_related.value'); 

            $due = Due::find($dueId);

            if (empty($due)) {
                $this->setSuccess(false);
                $this->addToResponseArray('message', 'Due not found');
                return $this->getResponseArrayJson();
            }

            $input = $request->all();

            $exists = $briefcase->dues()->whereDueId($dueId);

            if ($exists) {
                $briefcase->dues()->updateExistingPivot($dueId, 
                    ['amount' => $request->input('due.amount')]
                );
                $this->setSuccess(true);
                $this->addToResponseArray('message', 'Due successfully updated to briefcase');
                $this->addToResponseArray('data', $input);
                return $this->getResponseArrayJson(); 
            }else{
                $briefcase->dues()->attach($dueId, 
                    ['amount' => $request->input('due.amount')]
                );
                $this->setSuccess(true);
                $this->addToResponseArray('message', 'Due correctly associated with briefcase');
                $this->addToResponseArray('data', $input);
                return $this->getResponseArrayJson(); 
            }
        }
        return $this->getResponseArrayJson(); 
    }


    public function showInterestList(Request $request, $briefcaseId = null)
    {
        $briefcase = Briefcase::find($briefcaseId);
        return view('briefcases.interests.index', compact('briefcase'));
    }



}
