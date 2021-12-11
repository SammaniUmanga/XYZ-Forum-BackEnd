<?php

namespace App\Services;
use App\Enums\ErrorCodes;
use App\Repositories\Contracts\CommentRepositoryInterface;
use App\Services\Contracts\CommentServiceInterface;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Log;

class CommentService implements CommentServiceInterface
{
    use ApiResponser;
    private $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function addComment($validated)
    {
        try {
            $newComment = $this->commentRepository->addNewComment($validated);

            if(isset($newComment)) {
                return $this->respondSuccess("Comment Added Successfully!");
            } else {
                return $this->respondInternalServerError("Something went wrong", ErrorCodes::SERVER_ERROR);
            }

        } catch (Exception $e) {
            Log::error($e);
            return $this->respondInternalServerError('Could not load', ErrorCodes::NOT_FOUND);
        }
    }

}
