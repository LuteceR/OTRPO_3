<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterCardController;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\Api\CharacterCardApiController;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/cards', [CharacterCardApiController::class, 'index']);
    Route::post('/cards', [CharacterCardApiController::class, 'store']);
    Route::put('/cards/{card}', [CharacterCardApiController::class, 'update']);
});

// Route::resource('character-cards', CharacterCardController::class);
