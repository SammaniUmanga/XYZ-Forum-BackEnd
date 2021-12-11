<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::post('sign-in', [UserController::class, 'login']);
    Route::post('sign-up', [UserController::class, 'register']);
});

Route::prefix('admin')->group(function () {
    Route::post('approve-posts', [AdminController::class, 'approvePosts']);
});

Route::prefix('posts')->group(function () {
    Route::post('add-posts', [PostController::class, 'addPost']);
    Route::post('delete-posts', [PostController::class, 'deletePost']);
    Route::get('get-posts', [PostController::class, 'getPost']);
    Route::get('get-all-posts', [PostController::class, 'getAllPost']);

    //not implemented yet
    Route::get('search-posts', [PostController::class, 'searchPost']);
});

Route::prefix('comments')->group(function () {
    Route::post('add-comment', [CommentController::class, 'addComment']);

    //not implemented yet
    Route::post('reply-comment', [CommentController::class, 'addReply']);
    Route::get('get-comments', [CommentController::class, 'getComments']);
    Route::get('get-replies', [CommentController::class, 'getReplies']);
});
