<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCommentRequest;
use App\Services\Contracts\CommentServiceInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentService;

    public function  __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
    }

    //Add comment
    public function addComment(AddCommentRequest $request)
    {
        $validated = $request->validated();
        return $this->commentService->addComment($validated);
    }
}
