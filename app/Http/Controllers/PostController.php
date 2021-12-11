<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\GetOnePostRequest;
use App\Http\Requests\SearchPostsRequest;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postService;

    public function  __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    //Add post
    public function addPost(AddPostRequest $request)
    {
        $validated = $request->validated();
        return $this->postService->addPost($validated);
    }

    //Delete post
    public function deletePost(DeletePostRequest $request)
    {
        $validated = $request->validated();
        return $this->postService->deletePost($validated);
    }

    //Get not deleted selected post
    public function getPost(GetOnePostRequest $request)
    {
        $validated = $request->validated();
        return $this->postService->getPost($validated);
    }

    //Get all posts
    public function getAllPost()
    {
        return $this->postService->getAllPost();
    }

    //Search Posts
    public function searchPost(SearchPostsRequest $request)
    {
        $validated = $request->validated();
        return $this->postService->searchPost($validated);
    }
}
