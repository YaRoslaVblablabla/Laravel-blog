<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|',
            'password' => 'required|string|min:5|max:15'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'This fiels is required',

            'password.min' => 'Password length should be 5-15 symbols',
            'password.max' => 'Password length should be 5-15 symbols',
        ];
    }
}
