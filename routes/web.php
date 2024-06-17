<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserManagementController;

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
    //instead of  all routes this route should here bcz anyone cnt access by url
    Route::resource('users',UserManagementController::class);
    Route::resource('categories', CategoryController::class);
});


 

// Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
// Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');

//if you need to add extra 
//Route::get('users/orders',[UserManagementController::class,'orders'])->name('users.orders');
//and use except to avoid unuse method

require __DIR__.'/auth.php';
