<?php

namespace App\Services\Contracts;

interface PostServiceInterface
{
    public function addPost($validated);
    public function deletePost($validated);
}
