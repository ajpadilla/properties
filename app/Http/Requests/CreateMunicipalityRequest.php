<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMunicipalityRequest extends FormRequest
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
            'code' => 'min:1|max:15|unique:municipalities,code',
            'name' => 'required|min:1|max:30|unique:municipalities,name',
            'state_related.value' => 'required|integer|exists:states,id'
        ];
    }
}
