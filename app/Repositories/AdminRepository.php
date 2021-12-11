<?php

namespace App\Repositories;
use App\Models\Post;
use App\Repositories\Contracts\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function approvePosts($validated)
    {
        Post::where('id', $validated['post_id'])
            ->update(['approve_status' => $validated['approve_status'], 'approved_by' => $validated['approved_by']]);
    }
}
