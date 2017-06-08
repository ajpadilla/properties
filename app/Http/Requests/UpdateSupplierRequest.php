<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
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
            'identification_number' => 'required|min:1|max:45|unique:suppliers,identification_number,'.$this->id,
            'supplier_regime' => 'required|min:1|max:50',
            'business_name' => 'required|min:1|max:50',
            'legal_representative' => 'required|min:1|max:500',
            'economic_activity' => 'required|min:1|max:50',
            'admission_date' => 'required',
            'address' => 'required|min:1|max:500',
            'home_phone' => 'required|min:1|max:20',
            'auxiliary_phone' => 'min:1|max:20',
            'cell_phone' => 'required|min:1|max:20',
            'auxiliary_cell' => 'min:1|max:20',
            'home_email' => 'required|min:1|max:30|email|unique:suppliers,home_email,'.$this->id,
            'auxiliary_email' => 'min:1|max:30|email',
            'type_identification_related.value' => 'required|integer|exists:type_identifications,id'
        ];
    }
}
