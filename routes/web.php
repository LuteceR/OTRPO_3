<?php

use app\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blahController;
use App\Http\Controllers\CharacterCardController;
use App\Http\Controllers\CardCommentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/character-cards/deleted',
    [CharacterCardController::class, 'deleted'])->name('character-cards.deleted');

Route::patch(
    '/character-cards/{id}/restore',
    [CharacterCardController::class, 'restore']
    )->name('character-cards.restore');

Route::resource('character-cards', CharacterCardController::class);

Route::get('character-cards/{id}/comments', [CardCommentController::class, 'index'])->name('card-comments.index');
Route::get('character-cards/{id}/comments/create', [CardCommentController::class, 'create'])->name('card-comments.create');
Route::post('character-cards/{id}/comments', [CardCommentController::class, 'store'])->name('card-comments.store');
