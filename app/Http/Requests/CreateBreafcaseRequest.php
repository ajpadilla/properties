<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBreafcaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date_cut' => 'required',  
            'publication_date' => 'required', 
            'honorarium' => 'required|numeric',
            'total_capital' => 'required|numeric',
            'total_sanction' => 'required|numeric',
            'total_interest' =>'required|numeric' ,
            'total_debt' => 'required|numeric',
            'debt_indicator' => 'required|integer',
            'sms_indicator' => 'required|integer',
            'positive_balance' => 'required|numeric',
            'application_code' => 'required|min:1|max:20',
            'debt_height' => 'required|integer',
            'property_related.value' => 'required|integer|exists:properties,id'
        ];
    }
}
