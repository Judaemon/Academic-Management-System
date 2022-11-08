<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index'])->name('roles.index');

    // user
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('change-password', [\App\Http\Controllers\PasswordController::class, 'changePassword'])->name('change-password');
    Route::put('change-password', [\App\Http\Controllers\PasswordController::class, 'updatePassword'])->name('update-password');

    // teacher grades export/import
    Route::get('teacher-grades', [\App\Http\Controllers\TeacherGradeController::class, 'index'])->name('teacher_grades.index');
    Route::get('teacher-grades/export', \App\Http\Livewire\TeacherGrades\Export::class)->name('teacher_grades.export');
    Route::put('teacher-grades/import', \App\Http\Livewire\TeacherGrades\Import::class)->name('teacher_grades.import');

    // settings
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');

    // accounting
    Route::get('fees', [\App\Http\Controllers\FeesController::class, 'index'])->name('fees.index');

    Route::get('payments', [\App\Http\Controllers\PaymentsController::class, 'index'])->name('payments.index');

    Route::get('payments/create-payments', \App\Http\Livewire\Payments\CreatePayments::class)->name('payments.create');

    // academic
    Route::get('academic-year', [\App\Http\Controllers\AcademicYearController::class, 'index'])->name('academic_year.index');

    Route::get('sections', [\App\Http\Controllers\SectionController::class, 'index'])->name('sections.index');

    Route::get('subjects', [\App\Http\Controllers\SubjectController::class, 'index'])->name('subjects.index');

    Route::get('student-grades', [\App\Http\Controllers\GradeController::class, 'index'])->name('student_grades.index');

    Route::get('grade-level', [\App\Http\Controllers\GradeLevelController::class, 'index'])->name('grade_level.index');

    Route::get('admissions', [\App\Http\Controllers\AdmissionController::class, 'index'])->name('admissions.index');

    // idk ¯\_(ツ)_/¯
    Route::view('about', 'about')->name('about');
});
