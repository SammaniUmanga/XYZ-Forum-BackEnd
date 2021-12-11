<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApprovePostRequest extends FormRequest
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
            'approve_status' => 'required|integer',
            'approved_by' => 'required|exists:admins,id',
        ];
    }

    public function messages()
    {
        return [
            'post_id.required'         => 'PostId is required',
            'post_id.exists'           => 'PostId is not exists',
            'approve_status.required'  => 'Invalid email address',
            'approved_by.required'     => 'ApprovedId is required',
            'approved_by.exists'       => 'ApprovedId is not exists',
        ];
    }

}
