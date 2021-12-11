<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetOneReplyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reply_id' => 'required|exists:replies,id'
        ];
    }

    public function messages()
    {
        return [
            'reply_id.required'         => 'ReplyId is required',
            'reply_id.exists'           => 'ReplyId is not exists'
        ];
    }
}
