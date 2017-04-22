<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'description' => 'required|min:1|max:500',
            'number' => 'required|min:1|max:45|unique:properties,number,'.$this->id,
            'area' =>'required|min:1|max:50',
            'number_habitants' => 'required|integer',
            'number_pets' => 'required|integer',
            'address' => 'required|min:1|max:500',
            'registration_number' => 'required|min:1|max:20|unique:properties,registration_number,'.$this->id,
            'date_construction' => 'required', 
            'status' => 'required|integer',
            'reside_property' => 'required|integer',
            'type_contract' => 'required|min:1|max:30',
            'start_date_lease' => 'required',
            'end_date_lease' => 'required',
            'type_property_related.value' => 'required|integer|exists:type_properties,id',
            'community_related.value' => 'required|integer|exists:communities,id',
            'person_related.value' => 'required|integer|exists:persons,id'
        ];
    }
}
