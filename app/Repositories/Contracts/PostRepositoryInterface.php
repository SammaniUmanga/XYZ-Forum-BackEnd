<?php

namespace App\Repositories\Contracts;

interface PostRepositoryInterface
{
    public function checkPostedPerson($postedBy);
    public function adminAddNewPost($validated);
    public function customerAddNewPost($validated);
    public function deletePost($validated);
    public function getOnePost($validated);
    public function getAllPost();
//    public function searchPost($validated);
}
