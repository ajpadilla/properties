<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCountryRequest extends FormRequest
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
            'name' => 'required|min:1|max:30|unique:currencies,name,'.$this->id,
            'code' => 'required|min:1|max:15|unique:countries,code,'.$this->id,
            'language' => 'required|min:1|max:30|',
            'currency_id' => 'required|integer|exists:currencies,id'
        ];
    }
}
