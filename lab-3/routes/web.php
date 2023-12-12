<?php

use App\Http\Controllers\AccountingController;
use App\Http\Controllers\ProfileController;
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

// Route::resource('accountings', AccountingController::class);

Route::middleware('auth')->group(function () {
    Route::get('/accountings/create', [AccountingController::class, 'create'])
    ->name('accountings.create');
    Route::get('/accountings/{accounting}', [AccountingController::class, 'show'])
    ->name('accountings.show');
    Route::post('/accountings/', [AccountingController::class, 'store'])
    ->name('accountings.store');
    Route::get('/accountings/{accounting}/edit', [AccountingController::class, 'edit'])
    ->name('accountings.edit');
    Route::put('/accountings/{accounting}', [AccountingController::class, 'update'])
    ->name('accountings.update');
    Route::delete('/accountings/{accounting}', [AccountingController::class, 'destroy'])
    ->name('accountings.destroy');
});
Route::get('/accountings', [AccountingController::class, 'index'])
    ->name('accountings.index');

require __DIR__ . '/auth.php';
