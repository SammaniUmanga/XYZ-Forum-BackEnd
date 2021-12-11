<?php

namespace App\Repositories;
use App\Models\Post;
use App\Models\User;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function checkPostedPerson($postedBy)
    {
       return User::where('id', $postedBy)->select('user_role_id')->first();
    }

    public function adminAddNewPost($validated)
    {
        //admin added post's approve status are set to 3.
        $adminPost = new Post();
        $adminPost->posted_by = $validated['posted_by'];
        $adminPost->post_description = $validated['post_description'];
        $adminPost->approve_status = config('custom.approve_status.admin_post');
        $adminPost->save();

        return $adminPost;
    }

    public function customerAddNewPost($validated)
    {
        $customerPost = new Post();
        $customerPost->posted_by = $validated['posted_by'];
        $customerPost->post_description = $validated['post_description'];
        $customerPost->save();

        return $customerPost;
    }
}
