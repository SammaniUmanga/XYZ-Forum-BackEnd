<?php

namespace App\Http\Requests;

use App\Rules\PasswordCheck;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => ['required', 'required_with:password_confirmation', 'same:password_confirmation' ,Password::min(6)->letters(),new PasswordCheck()],
            'password_confirmation' => 'required',
            'user_type' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'User name is required',
            'email.required'         => 'Email address is required',
            'email.exists'           => 'Invalid email address',
            'email.email'            => 'Invalid email address',
            'user_type.required'     => 'User type is required'
        ];
    }
}
