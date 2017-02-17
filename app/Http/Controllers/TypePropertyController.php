<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeProperty;

class TypePropertyController extends Controller
{
    public function index(Request $request)
    {
    	return response()->json(TypeProperty::paginate(2));
    }
}
