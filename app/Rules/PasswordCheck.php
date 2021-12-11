<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PasswordCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $success = 0;

        if(preg_match('@[A-Z]@', $value))
        {
            $success ++;
        }
        if(preg_match('@[a-z]@', $value))
        {
            $success ++;
        }
        if(preg_match('@[0-9]@', $value))
        {
            $success ++;
        }
        if(preg_match("/['^£$%&*()}{@#~?><>,|=_+¬-]/", $value)){
            $success ++;
        }

        if($success >= 3){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password format is incorrect.';
    }
}
