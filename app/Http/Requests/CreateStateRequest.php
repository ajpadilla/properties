<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStateRequest extends FormRequest
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
            'name' => 'required|min:1|max:30|unique:states,name',
            'code' => 'min:1|max:15|unique:states,code',
            'area_code' => 'required|min:1|max:30',
            'country_related.value' => 'required|integer|exists:countries,id'
        ];
    }
}
