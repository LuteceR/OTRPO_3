<?php

use app\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blahController;
use App\Http\Controllers\CharacterCardController;
use App\Http\Controllers\CardCommentController;
use App\Http\Controllers\DashboardController;


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

// комментарии
Route::get('/character-cards/{id}/comments', [CardCommentController::class, 'index'])->name('card-comments.index');
Route::get('/character-cards/{id}/comments/create', [CardCommentController::class, 'create'])->name('card-comments.create');
Route::post('/character-cards/{id}/comments', [CardCommentController::class, 'store'])->name('card-comments.store');

// лента друзей & список юзеров
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/dashboard/add-friend/{id}', [DashboardController::class, 'store'])->name('friend.store');
Route::post('/dashboard/remove-friend/{id}', [DashboardController::class, 'destroy'])->name('friend.destroy');

Route::get('/', [CharacterCardController::class, 'login']);

Route::post('/', [CharacterCardController::class, 'tryAuth'])->name('tryAuth');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');

Route::get('/registr', [CharacterCardController::class, 'registr'])->name('registr');

Route::post('/registr', [CharacterCardController::class, 'tryRegistr'])->name('tryRegistr');

Route::middleware('auth')->group(function () {
    Route::get('/character-cards', [CharacterCardController::class, 'index'])->name('character-cards.index');
});
