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
    Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index'])->name('roles.index');

    // user
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');

    // accounting
    Route::get('fees', [\App\Http\Controllers\FeesController::class, 'index'])->name('fees.index');

    Route::get('payments', [\App\Http\Controllers\PaymentsController::class, 'index'])->name('payments.index');

    Route::get('payments/create-payments', \App\Http\Livewire\Payments\CreatePayments::class)->name('payments.create');

    // academic
    Route::get('academic-year', [\App\Http\Controllers\AcademicYearController::class, 'index'])->name('academic_year.index');

    Route::get('sections', [\App\Http\Controllers\SectionController::class, 'index'])->name('sections.index');

    Route::get('subjects', [\App\Http\Controllers\SubjectController::class, 'index'])->name('subjects.index');

    Route::get('grade-level', [\App\Http\Controllers\GradeLevelController::class, 'index'])->name('grade_level.index');

    // idk ¯\_(ツ)_/¯
    Route::view('about', 'about')->name('about');
});
