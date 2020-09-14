<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
            'update_rating' => 'required',
            'update_review' => 'required|max: 255'
        ];
    }

    public function messages()
    {
        return [
            'rating.required' => 'Rating me pls',
            'content.max' => 'Max is 255 characters',
            'content.required' => 'Required content of review'
        ];
    }
}
