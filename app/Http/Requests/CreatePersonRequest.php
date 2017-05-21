<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePersonRequest extends FormRequest
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
            'identification_number' => 'required|min:1|max:45|unique:persons,identification_number',
            'business_name' => 'required|min:1|max:45',
            'first_name' => 'required|min:1|max:20',
            'second_name' => 'required|min:1|max:20',
            'first_surname' => 'required|min:1|max:25',
            'second_surname' => 'required|min:1|max:25',
            'home_phone' => 'required|min:1|max:30',
            'auxiliary_phone' => 'max:30',
            'cell_phone' => 'required|min:1|max:30',
            'auxiliary_cell' => 'max:30',
            'home_email' => 'required|min:1|max:30|email|unique:persons,home_email',
            'auxiliary_email' => 'max:30',
            'correspondence_address' => 'required|min:1|max:500',
            'city_correspondence' => 'required|min:1|max:30',
            'country_correspondence' => 'required|min:1|max:30',
            'office_address' => 'required|min:1|max:500',
            'city_office' => 'required|min:1|max:30',
            'country_office' => 'required|min:1|max:30',
            'birth_date' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'cod_labor_activity' => 'required|min:1|max:30',
            'admission_date' => 'required',
            'cancellation_date' => 'required',
            'status' => 'required|integer',
            'city_birth_related.value' => 'required|integer|exists:municipalities,id',
            //'disability_related.value' => 'integer|exists:disabilities,id',
            'educational_level_related.value' => 'required|integer|exists:educational_levels,id',
            'type_identification_related.value' => 'required|integer|exists:type_identifications,id',
        ];
    }
}
