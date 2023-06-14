<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:20|unique:tags'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This fiels is required',

            'title.min' => 'Title length should be 3-20 symbols',
            'title.max' => 'Title length should be 3-20 symbols',
            'title.unique' => 'Category with this title alrady exists'
        ];
    }
}
