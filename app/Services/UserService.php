<?php

namespace App\Services;
use App\Enums\ErrorCodes;
use App\Services\Contracts\UserServiceInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Support\Facades\Log;

class UserService implements UserServiceInterface
{
    use ApiResponser;
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signIn($validated)
    {
        try {
            //encrypt user entered password
            $validated['password'] = hash('sha256', $validated['password']);
            $user = $this->userRepository->getUserDetails($validated['email']);

            //check whether user entered email & password are same as in the db
            if ($user->email == $validated['email'] && $user->password === $validated['password']) {
                $this->userRepository->userLoginUpdate($validated['email']);
                return $this->respondSuccess("Successfully logged!");
            } else {
                return $this->respondInternalServerError("Something went wrong", ErrorCodes::SERVER_ERROR);
            }

        } catch (Exception $e) {
            Log::error($e);
            return $this->respondInternalServerError('Could not load', ErrorCodes::NOT_FOUND);
        }
    }

}
