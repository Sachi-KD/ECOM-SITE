<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Route;

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


//instead of  all routes
Route::resource('users',UserManagementController::class); 

// Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
// Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');

//if you need to add extra 
//Route::get('users/orders',[UserManagementController::class,'orders'])->name('users.orders');
//and use except to avoid unuse method

require __DIR__.'/auth.php';
