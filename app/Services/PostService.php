<?php

namespace App\Services;
use App\Enums\ErrorCodes;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\Contracts\PostServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Log;

class PostService implements PostServiceInterface
{
    use ApiResponser;
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function addPost($validated)
    {
        try {
            //Check whether the post is posted by admin or customer.
             $checkPostedPerson = $this->postRepository->checkPostedPerson($validated['posted_by']);

             //Admin can post new posts without approving. Customer can add post but have to approve by admin to display on forum.
             if($checkPostedPerson['user_role_id'] == config('custom.user_role.admin')) {
                 $newPost = $this->postRepository->adminAddNewPost($validated);
             } else {
                 $newPost = $this->postRepository->customerAddNewPost($validated);
             }

             if(isset($newPost)) {
                 return $this->respondSuccess("Post Added Successfully!");
             } else {
                 return $this->respondInternalServerError("Something went wrong", ErrorCodes::SERVER_ERROR);
             }

        } catch (Exception $e) {
            Log::error($e);
            return $this->respondInternalServerError('Could not load', ErrorCodes::NOT_FOUND);
        }
    }

}
