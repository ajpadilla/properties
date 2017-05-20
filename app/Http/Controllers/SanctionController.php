<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanction;

class SanctionController extends Controller
{
  
   public function selectList(Request $request)
    {
        if ($request->ajax())
        {   
            $this->setSuccess(true);
            $this->addToResponseArray('data', 
                Sanction::all()->pluck('name', 'id')->toArray()
            );
            return $this->getResponseArrayJson(); 
        }
        return $this->getResponseArrayJson(); 
    }

}
