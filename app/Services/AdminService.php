<?php

namespace App\Services;
use App\Enums\ErrorCodes;
use App\Repositories\Contracts\AdminRepositoryInterface;
use App\Services\Contracts\AdminServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Log;

class AdminService implements AdminServiceInterface
{
    use ApiResponser;
    private $adminRepository;

    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function approvePost($validated)
    {
        try {
            //Update posts approval status
            $this->adminRepository->approvePosts($validated);
            return $this->respondSuccess("Successfully Approved!");
            
        } catch (Exception $e) {
            Log::error($e);
            return $this->respondInternalServerError('Could not load', ErrorCodes::NOT_FOUND);
        }
    }
}
