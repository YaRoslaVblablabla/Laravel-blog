<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|min:4|max:20',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:5|max:15|confirmed'
        ];
    }
   
    public function messages()
    {
        return [
            'name.required' => 'This fiels is required',
            'name.min' => 'Name length should be 4-20 sybols',
            'name.max' => 'Name length should be 4-20 sybols',

            'email.required' => 'This fiels is required',
            'email.unique' => 'user with this email is alrady exists',

            'password.min' => 'Password length should be 5-15 symbols',
            'password.max' => 'Password length should be 5-15 symbols',
        ];
    }
   
}
