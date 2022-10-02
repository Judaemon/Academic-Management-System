<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('sections', [\App\Http\Controllers\SectionController::class, 'index'])->name('sections.index');
    
    Route::get('subjects', [\App\Http\Controllers\SubjectController::class, 'index'])->name('subjects.index');

    Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index'])->name('roles.index');

    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');
});
