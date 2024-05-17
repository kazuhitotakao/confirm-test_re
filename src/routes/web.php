<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\ContactController;
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
    Route::get('/admin', [AuthController::class, 'index']);
});
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/', [ContactController::class, 'index']);
Route::get('/admin/search', [ContactController::class, 'search']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::delete('/admin/delete', [ContactController::class, 'destroy']);
Route::patch('/admin/update', [ContactController::class, 'update']);
// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/login', [AuthenticatedSessionController::class, 'store']);
