<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;



require('helper.php');


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


Route::get('/', [UserController::class, 'resultListPage'])->middleware("auth.check.middleware");
Route::get('/login', [AuthController::class, 'login']);
Route::post('/login-validation', [AuthController::class, 'loginValidation']);
Route::get('/registration', [AuthController::class, 'registration']);
Route::post('/registration-validation', [AuthController::class, 'registrationValidation']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::get('load-user-info', [UserController::class, 'getUserInfo']);
Route::get('/result-list', [UserController::class, 'resultListPage'])->middleware("auth.check.middleware");
Route::get('/get-result-list', [UserController::class, 'getResultList']);

