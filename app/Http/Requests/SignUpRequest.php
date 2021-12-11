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
            'email' => 'required|exists:admins,email|email',
            'password' => ['required', 'required_with:password_confirmation', 'same:password_confirmation' ,Password::min(8)->letters(),new PasswordCheck()],
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'         => 'Email address is required',
            'email.exists'           => 'Invalid email address',
            'email.email'            => 'Invalid email address',
        ];
    }
}
