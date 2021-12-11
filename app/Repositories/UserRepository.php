<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\Customer;
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

    public function addAdmin($validated)
    {
        try {
            $newAdminUser = new User();
            $newAdminUser->user_role_id = $validated['user_type'];
            $newAdminUser->name = $validated['name'];
            $newAdminUser->email = $validated['email'];
            $newAdminUser->password = $validated['password'];
            $newAdminUser->save();

            $newAdmin = new Admin();
            $newAdmin->user_id = $newAdminUser->user_role_id;
            $newAdmin->admin_name = $validated['name'];
            $newAdmin->email = $validated['email'];
            $newAdmin->save();

        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

    public function addCustomer($validated)
    {
        try {
            $newCusUser = new User();
            $newCusUser->user_role_id = $validated['user_type'];
            $newCusUser->name = $validated['name'];
            $newCusUser->email = $validated['email'];
            $newCusUser->password = $validated['password'];
            $newCusUser->save();

            $newCustomer = new Customer();
            $newCustomer->user_id = $newCusUser->user_role_id;
            $newCustomer->customer_name = $validated['name'];
            $newCustomer->email = $validated['email'];
            $newCustomer->save();

        } catch (Exception $e) {
            throw new Exception($e);
        }
    }

}
