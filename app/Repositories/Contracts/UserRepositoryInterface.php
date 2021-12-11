<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{
    public function getUserDetails($email);
    public function userLoginUpdate($email);
    public function addAdmin($validated);
    public function addCustomer($validated);
}
