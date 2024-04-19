<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// use the task controller
use App\Http\Controllers\TaskController;


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

// task manager functionality routes
Route::get('/', [TaskController::class, 'index']);

Route::post('/storeItemRoute', [TaskController::class, 'storeItem'])->name('storeItem');

Route::post('/markCompleteRoute/{id}', [TaskController::class, 'markComplete'])->name('markComplete');

Route::get('/editItem/{id}', [TaskController::class, 'editItem'])->name('editItem');

Route::put('/updateItem/{id}', [TaskController::class, 'updateItem'])->name('updateItem');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
