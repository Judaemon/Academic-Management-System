<?php

use App\Http\Controllers\GradeLevelController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('users', [UserController::class, 'users'])->name('users.users');
Route::get('teachers', [UserController::class, 'teachers'])->name('users.teachers');
Route::get('students', [UserController::class, 'students'])->name('users.students');

Route::get('roles', [RolesController::class, 'roles'])->name('roles.roles');

Route::get('subjects', [SubjectController::class, 'subjects'])->name('subjects.subjects');

Route::get('grade_level', [GradeLevelController::class, 'grade_level'])->name('grade_level.grade_level');

Route::get('fees', [FeesController::class, 'fees'])->name('other.fees');
