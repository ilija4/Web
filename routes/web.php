<?php

use App\Http\Controllers\DoctorWhoSeasonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function () {
    Route::get('/', [DoctorWhoSeasonController::class, 'index']);
    Route::get('/doctor_who/create', [DoctorWhoSeasonController::class, 'create']);
    Route::post('/doctor_who', [DoctorWhoSeasonController::class, 'store']);
    Route::get('/doctor_who/{season}', [DoctorWhoSeasonController::class, 'show']);
    Route::get('/doctor_who/{season}/edit', [DoctorWhoSeasonController::class, 'edit']);
    Route::patch('/doctor_who/{season}', [DoctorWhoSeasonController::class, 'update']);
    Route::delete('/doctor_who/{season}', [DoctorWhoSeasonController::class, 'destroy']);
    Route::post('/doctor_who/{season}/restore', [DoctorWhoSeasonController::class, 'restore']);
    Route::delete('/doctor_who/{season}/forceDelete', [DoctorWhoSeasonController::class, 'forceDelete']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user:name}', [UserController::class, 'show']);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
