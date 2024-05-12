<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::controller(BlogController::class)->group(function(){
    Route::get('/','index')->name('index');
    Route::get('/blog/create','create')->name('blog.create');
    Route::post('/blog/store','store')->name('blog.store');
    Route::get('/blog/edit/{blog}','edit')->name('blog.edit');
    Route::get('/blog/{blog:slug}', 'show')->name('blog.show');
    Route::post('/blog/update/{blog}','update')->name('blog.update');
    Route::get('/blog/destroy/{blog}', 'destroy')->name('blog.destroy');
});

Route::controller(RegisteredUserController::class)->group(function(){
    Route::get('/friends','index')->name('users.index')->middleware('auth');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/{user:username}', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
