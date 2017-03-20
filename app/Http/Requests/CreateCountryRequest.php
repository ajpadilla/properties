<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCountryRequest extends FormRequest
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
            'name' => 'required|min:1|max:30|unique:currencies,name',
            'code' => 'required|min:1|max:15|unique:countries,code',
            'language' => 'required|min:1|max:30|',
            'currency_related.value' => 'required|integer|exists:currencies,id'
        ];
    }
}
