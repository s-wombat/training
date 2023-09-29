<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

Route::resource('users', UserController::class)->middleware('auth')->only([
    'index', 'edit', 'update', 'destroy'
]);

Route::controller(UserController::class)->middleware('auth')->prefix('users')->name('users.')->group(function () {
    Route::post('/filter', 'filter')->name('filter');
    Route::get('/clear', 'clear')->name('clear');
});

Route::controller(TariffController::class)->middleware('auth')->prefix('tariffs')->name('tariffs.')->group(function () {
    Route::get('/up', 'up')->name('up');
});
