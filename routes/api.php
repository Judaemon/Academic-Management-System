<?php

use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('teachers', [UserController::class, 'teachers'])->name('users.teachers');
Route::get('students', [UserController::class, 'students'])->name('users.students');

Route::get('roles', [RolesController::class, 'roles'])->name('roles.roles');