<?php

use App\Http\Controllers\LikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

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
Route::apiResource('/question', 'App\Http\Controllers\QuestionController');

Route::apiResource('/category', 'App\Http\Controllers\CategoryController');

Route::apiResource('/question/{question}/reply', 'App\Http\Controllers\ReplyController');

Route::post('/like/{reply}', [LikeController::class, 'likeIt']);
Route::delete('/like/{reply}', [LikeController::class, 'unLikeIt']);