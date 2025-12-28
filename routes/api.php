<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\CharacterCardController;
use Laravel\Passport\Http\Controllers\AccessTokenController;

use App\Http\Controllers\Api\CardCommentApiController;
use App\Http\Controllers\Api\CharacterCardApiController;
use App\Http\Controllers\Api\AuthController;

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

Route::post('oauth/token', [
    AccessTokenController::class,
    'issueToken'
]);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('character-cards', CharacterCardApiController::class)->only(['index','store','update']);
    Route::get('/cards', [CharacterCardApiController::class, 'index']);
    Route::post('/cards', [CharacterCardApiController::class, 'store']);
    Route::put('/cards/{card}', [CharacterCardApiController::class, 'update']);

    Route::get('card-comments', [CardCommentApiController::class, 'index']);
    Route::post('card-comments', [CardCommentApiController::class, 'store']);
    Route::put('card-comments/{cardComment}', [CardCommentApiController::class, 'update']);
    Route::delete('card-comments/{cardComment}', [CardCommentApiController::class, 'destroy']);
});



// Route::resource('character-cards', CharacterCardController::class);
