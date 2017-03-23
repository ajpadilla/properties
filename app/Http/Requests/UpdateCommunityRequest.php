<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommunityRequest extends FormRequest
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
            'nit' => 'required|min:1|max:45|unique:communities,nit,'.$this->id, 
            'name' => 'required|min:1|max:45', 
            'home_phone' => 'required|min:1|max:20',
            'auxiliary_phone' => 'min:1|max:20',
            'cell_phone' => 'required|min:1|max:20',
            'auxiliary_cell' => 'min:1|max:20',
            'home_email' => 'required|min:1|max:30|email|unique:communities,home_email,'.$this->id,
            'auxiliary_email' => 'min:1|max:30|email',
            'address' => 'required|min:1|max:500',
            'status' => 'required|integer',
            'opening_date' => 'required',
            //'cancellation_date' => '',
            'reason_retiring' => 'min:1|max:500',
            'municipality_related.value' => 'required|integer|exists:municipalities,id',
            'type_community_related.value' => 'required|integer|exists:type_communities,id'
        ];
    }
}
