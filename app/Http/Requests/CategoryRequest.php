<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:30|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This fiels is required',
            'title.min' => 'Title length should be 3-30 symbols',
            'title.max' => 'Title length should be 3-30 symbols',
            'title.unique' => 'Category with this title alrady exists'
        ];
    }
}
