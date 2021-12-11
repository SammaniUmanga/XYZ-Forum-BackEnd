<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCommentRequest extends FormRequest
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
            'post_id' => 'required|exists:posts,id',
            'commented_by' => 'required|exists:users,id',
            'comment_description' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'post_id.required'         => 'PostId is required',
            'post_id.exists'           => 'PostId is not exists',
            'commented_by.required'     => 'UserID is required',
            'commented_by.exists'       => 'UserID is not exists',
            'comment_description.required'     => 'Comment description is required',
        ];
    }
}
