<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NovelController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);    

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('contents', [ContentController::class, 'index']); 
Route::get('contents/{id}', [ContentController::class, 'show']); 
Route::post('contents', [ContentController::class, 'store']); 
Route::put('contents/update/{id}', [ContentController::class, 'update']);
Route::delete('contents/delete/{id}', [ContentController::class, 'destroy']);


Route::prefix('comments')->group(function () {
    Route::get('/', [CommentController::class, 'index']); 
    Route::post('/', [CommentController::class, 'store']);
    Route::get('/{id}', [CommentController::class, 'show']);
    Route::put('/{id}', [CommentController::class, 'update']); 
    Route::delete('/{id}', [CommentController::class, 'destroy']); 
});


Route::prefix('novels')->group(function () {
    Route::get('/', [novelController::class, 'index']);
    Route::post('/', [novelController::class, 'store']);
    Route::get('/{novel}', [novelController::class, 'show']);
    Route::put('/{novel}', [novelController::class, 'update']);
    Route::delete('/{novel}', [novelController::class, 'destroy']);
});
