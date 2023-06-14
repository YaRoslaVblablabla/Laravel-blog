<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => 'required|string|min:4|max:150',
            'content' => 'required|string|min:30',
            'file' => 'image',
            'category_id' => '',
            'tags' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'This fiels is required',
            'title.min' => 'Title length should be 4-150 symbols',
            'title.max' => 'Title length should be 4-150 symbols',

            'content.required' => 'This fiels is required',
            'content.min' => 'Content length should be more than 30 symbols',

            'file.required' => 'This fiels is required',
            'file.image' => 'file extension must be .jpg, .jpeg, .png, .bmp, .gif or .svg'
        ];
    }
}
