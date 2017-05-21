<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelationDueBriefcaseRequest extends FormRequest
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
            'due_related.value' => 'required|integer|exists:dues,id',
            'due.amount' => 'required|numeric'
        ];
    }
}
