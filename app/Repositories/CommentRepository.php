<?php

namespace App\Repositories;
use App\Models\Comment;
use App\Repositories\Contracts\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{

    public function addNewComment($validated)
    {
        $newComment = new Comment();
        $newComment->post_id = $validated['post_id'];
        $newComment->commented_by = $validated['commented_by'];
        $newComment->comment_description = $validated['comment_description'];
        $newComment->save();

        return $newComment;
    }

}
