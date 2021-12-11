<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
            'posted_by' => 'required|exists:users,id',
            'post_description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'posted_by.required'         => 'PostById is required',
            'posted_by.exists'           => 'PostById is not exists',
            'post_description.required'     => 'Post description is required'
        ];
    }
}
