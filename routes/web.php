<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MyProfileController;

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

Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/myProfile/{id}', [MyProfileController::class, 'show'])->middleware(['auth', 'verified'])->name('myProfile')->whereNumber('id');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get ('/posts/{id}',[PostController::class, 'show'])->name('postsShow')->whereNumber('id');
Route::get ('/posts/create',[PostController::class,'create'])->name('postsCreate');
Route::get ('/posts/{id}/edit',[PostController::class, 'edit'])->name('postsEdit')->whereNumber('id');
Route::patch ('/posts/{id}',[PostController::class, 'update'])->name('postsUpdate')->whereNumber('id');
Route::get ('/posts',[PostController::class, 'index'])->name('postIndex');
Route::delete('posts/{id}',[PostController::class,'destroy'])->name('postsDestroy')->whereNumber('id');
Route::post('/posts',[PostController::class,'store'])->name('postsStore');

Route::get('/users',[UserController::class, 'index'])->name('usersIndex');
Route::get ('/users/{user}',[UserController::class, 'show'])->name('usersShow');




    


require __DIR__.'/auth.php';
