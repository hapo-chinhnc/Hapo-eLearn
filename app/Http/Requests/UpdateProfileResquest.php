<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileResquest extends FormRequest
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
            'name' => 'required|min: 5|max: 50',
            'email_update' => 'required|email|unique:users,email, '. auth()->user()->id . ',id',
            'birth_day' => 'date',
            'phone' => 'max: 30',
            'address' => 'max: 150',
            'about' => 'max: 255',
        ];
    }
}
