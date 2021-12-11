<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Carbon\Carbon;
use Exception;

class UserRepository implements UserRepositoryInterface
{
    public function getUserDetails($email)
    {
        try {
            return User::where('email', $email)->first();
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function userLoginUpdate($email)
    {
        try {
             User::where('email', $email)
                ->update(['last_login' => Carbon::now()->toDateTimeString(), 'is_active_session' => 1]);
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

}
