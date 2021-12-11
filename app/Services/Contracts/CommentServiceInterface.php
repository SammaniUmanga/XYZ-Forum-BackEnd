<?php

namespace App\Services\Contracts;

interface CommentServiceInterface
{
    public function addComment($validated);
}
