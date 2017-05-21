<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStateRequest extends FormRequest
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
            'name' => 'required|min:1|max:30|unique:states,name,'.$this->id,
            'code' => 'min:1|max:15|unique:states,code,'.$this->id ,
            'area_code' => 'required|min:1|max:30',
            'country_id' => 'required|integer|exists:countries,id'
        ];
    }
}
