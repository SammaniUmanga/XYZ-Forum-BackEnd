<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApprovePostRequest;
use App\Services\Contracts\AdminServiceInterface;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;

    public function  __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function approvePosts(ApprovePostRequest $request)
    {
        $validated = $request->validated();
        return $this->adminService->approvePost($validated);
    }
}
