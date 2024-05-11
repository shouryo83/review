<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SpotifyController;
use APP\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', [ReviewController::class, 'index'])->name('review.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('review.create');
    Route::get('/dates?{name}', [ReviewController::class, 'getDates']);
    Route::get('/reviews/{review}', [ReviewController::class ,'show'])->name('reviews.show');
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit']);
    Route::put('/reviews/{review}', [ReviewController::class, 'update']);
    Route::get('/festivals/{festival}', [FestivalController::class, 'index']);
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::delete('/reviews/{review}', [ReviewController::class, 'delete']);
    Route::post('/reviews/{review}/comments', [CommentController::class, 'store']);
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comments.delete');
    Route::get('review/like/{id}', [ReviewController::class, 'like'])->name('like');
    Route::get('review/unlike/{id}', [ReviewController::class, 'unlike'])->name('unlike');
    Route::get('/spotify/redirect', [AuthController::class, 'redirectToSpotify'])->name('spotify.redirect');
    Route::get('/spotify/callback', [AuthController::class, 'handleSpotifyCallback']);
    Route::get('/playlists/index', [SpotifyController::class, 'getPlaylists']);
    Route::get('/playlists/{id}', [PlaylistController::class, 'show'])->name('playlists.show');
});

require __DIR__.'/auth.php';
