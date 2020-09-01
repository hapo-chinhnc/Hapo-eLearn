<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|min:5|max:50',
            'password' => 'required|min:8|max:16',
            'phone' => 'required',
            'role' => 'required|min:0|max:2'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Input Name',
            'phone.required' => 'Input Phone Number',
            'password.required' => 'Input Password',
            'password.min' => 'Password must be lest 8 charater',
            'password.max' => 'Password must be max 16',
            'role.max' => 'It is not a type of user',
            'role.min' => 'It is not a type of user'
        ];
    }
}
