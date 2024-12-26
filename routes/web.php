<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;

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

Route::get('/', [SiteController::class, 'home']);

Route::get('/login', [SiteController::class, 'loginForm'])->name('login');
Route::post('/login', [SiteController::class, 'login']);
Route::post('/register', [SiteController::class, 'register']);
Route::get('/register', [SiteController::class, 'registerForm']);

Route::group(['middleware' => 'auth'], function () {

    Route::post('/logout', [SiteController::class, 'logout']);

    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/subjects/create', [SubjectController::class, 'create']);
    Route::get('/subjects/edit/{id}', [SubjectController::class, 'edit']);
    Route::get('/subjects/delete/{id}', [SubjectController::class, 'delete']);
    Route::get('/subjects/view/{id}', [SubjectController::class, 'view']);
    Route::delete('/subjects/{subject}', [SubjectController::class, 'destroy']);
    Route::put('/subjects/{subject}', [SubjectController::class, 'update']);
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::post('/subjects', [SubjectController::class, 'store']);

    Route::get('/students/create', [StudentController::class, 'create']);
    Route::get('/students/edit/{id}', [StudentController::class, 'edit']);
    Route::get('/students/view/{id}', [StudentController::class, 'view']);
    Route::put('/students/{student}', [StudentController::class, 'update']);
    Route::get('/students/delete/{id}', [StudentController::class, 'delete']);
    Route::delete('/students/{student}', [StudentController::class, 'destroy']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::post('/students', [StudentController::class, 'store']);
});
