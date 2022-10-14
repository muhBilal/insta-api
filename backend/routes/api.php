<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');
Route::get('logout', 'Api\AuthController@logout');

Route::middleware(['jwtAuth'])->group(function () {
    // post
    Route::post('posts/create', 'Api\PostsController@create');
    Route::post('posts/delete', 'Api\PostsController@delete');
    Route::post('posts/update', 'Api\PostsController@update');
    Route::get('posts', 'Api\PostsController@posts');

    // comment
    Route::post('comments/create', 'Api\CommentsController@create');
    Route::post('comments/delete', 'Api\CommentsController@delete');
    Route::post('comments/update', 'Api\CommentsController@update');
    Route::post('posts/comments', 'Api\CommentsController@comments');

    // like
    Route::post('posts/like', 'Api\LikesController@like');
});
