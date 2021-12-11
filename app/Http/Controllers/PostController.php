<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function  __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function addPost(AddPostRequest $request)
    {
        $validated = $request->validated();
        return $this->postService->addPost($validated);
    }

    public function deletePost(DeletePostRequest $request)
    {
        $validated = $request->validated();
        return $this->postService->deletePost($validated);
    }

}
