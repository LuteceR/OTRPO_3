<?php

use app\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blahController;
use App\Http\Controllers\CharacterCardController;
use App\Http\Controllers\CardCommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;


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

Route::delete('character-cards/{characterCard}', function (CharacterCard $characterCard) {
    $user = Auth::user();

    if ($user->is_admin || $characterCard->user_id === $user->id) {
        $characterCard->delete();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Нет прав на удаление'], 403);
})->middleware('auth');

// комментарии
Route::get('character-cards/{id}/comments', [CardCommentController::class, 'index'])->name('card-comments.index');
Route::get('character-cards/{id}/comments/create', [CardCommentController::class, 'create'])->name('card-comments.create');
Route::post('character-cards/{id}/comments', [CardCommentController::class, 'store'])->name('card-comments.store');

// лента друзей & список юзеров
Route::get('dashboard', [DashboardController::class, 'index']);
Route::post('dashboard/add-friend/{id}', [DashboardController::class, 'store'])->name('friend.store');
Route::post('dashboard/remove-friend/{id}', [DashboardController::class, 'destroy'])->name('friend.destroy');
Route::get('dashboard/feed', [DashboardController::class, 'feed'])->name('feed');

Route::get('/', [CharacterCardController::class, 'login'])->name('login');

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

Route::delete('/character-cards/{id}/force-delete', 
    [CharacterCardController::class, 'forceDelete']
)->name('character-cards.forceDelete');

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/users/{user}', [UserController::class, 'show'])
    ->name('users.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');