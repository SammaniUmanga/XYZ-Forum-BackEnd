<?php

namespace App\Repositories\Contracts;

interface CommentRepositoryInterface
{
    public function addNewComment($validated);
}
