<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Services\Contracts\UserServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    public function  __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login(SignInRequest $request)
    {
         $validated = $request->validated();
         return $this->userService->signIn($validated);
    }

    public function register(SignUpRequest $request)
    {
        $validated = $request->validated();
        return $this->userService->userSignUp($validated);
    }

}
