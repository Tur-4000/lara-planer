<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanerCreateRequest extends FormRequest
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
            'title' => 'required|min:3|max:128',
            'category_id' => 'required',
            'due_date' => 'required',
        ];
    }
}
