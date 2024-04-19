<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FestivalController;
use App\Http\Controllers\CommentController;

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
    Route::get('/', [ReviewController::class, 'index'])->name('index');
    Route::get('/reviews/create', [ReviewController::class, 'create']);
    Route::get('/reviews/{review}', [ReviewController::class ,'show'])->name('reviews.show');
    Route::post('/reviews', [ReviewController::class, 'store']);
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit']);
    Route::put('/reviews/{review}', [ReviewController::class, 'update']);
    Route::get('/festivals/{festival}', [FestivalController::class, 'index']);
    Route::get('/user', [UserController::class, 'index']);
    Route::delete('/reviews/{review}', [ReviewController::class, 'delete']);
    Route::post('/reviews/{review}/comments', [CommentController::class, 'store']);
    Route::delete('/comments/{comment}', [CommentController::class, 'delete'])->name('comments.delete');
    
});

require __DIR__.'/auth.php';
