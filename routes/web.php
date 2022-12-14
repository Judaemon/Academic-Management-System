<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('roles', [\App\Http\Controllers\RolesController::class, 'index'])->name('roles.index');

    // user
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // announcement
    Route::get('announcement', [\App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('announcement/send-mail', [\App\Http\Controllers\AnnouncementController::class, 'sendMail'])->name('announcement.mail');

    Route::get('change-password', [\App\Http\Controllers\PasswordController::class, 'changePassword'])->name('change-password');
    Route::put('change-password', [\App\Http\Controllers\PasswordController::class, 'updatePassword'])->name('update-password');

    // teacher & student grades export/import
    Route::get('teacher-grades', [\App\Http\Controllers\TeacherGradeController::class, 'index'])->name('teacher_grades.index');
    Route::get('teacher-grades/export', \App\Http\Livewire\TeacherGrade\Export::class)->name('teacher_grades.export');

    Route::get('student-grades', [\App\Http\Controllers\StudentGradeController::class, 'index'])->name('student_grades.index');
    Route::get('student-grades/export', \App\Http\Livewire\StudentGrade\Export::class)->name('student_grades.export');
    Route::get('student-grades/{user}/{admission}', [\App\Http\Controllers\StudentGradeController::class, 'generate_pdf'])->name('student_grades.pdf');

    // settings
    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('setting.index');

    // accounting
    Route::get('fees', [\App\Http\Controllers\FeesController::class, 'index'])->name('fees.index');

    Route::get('payments', [\App\Http\Controllers\PaymentsController::class, 'index'])->name('payments.index');
    Route::get('payments/{user}/{payments}', [\App\Http\Controllers\PaymentsController::class, 'generate_pdf'])->name('payments.pdf');
    Route::get('student/payments', \App\Http\Livewire\Payments\AccountAndAssessment::class)->name('student.payments');

    // academic
    Route::get('academic-year', [\App\Http\Controllers\AcademicYearController::class, 'index'])->name('academic_year.index');

    Route::get('sections', [\App\Http\Controllers\SectionController::class, 'index'])->name('sections.index');

    Route::get('subjects', [\App\Http\Controllers\SubjectController::class, 'index'])->name('subjects.index');

    Route::get('grade-level', [\App\Http\Controllers\GradeLevelController::class, 'index'])->name('grade_level.index');

    Route::get('admissions', [\App\Http\Controllers\AdmissionController::class, 'index'])->name('admissions.index');

    // idk ??\_(???)_/??
    Route::view('about', 'about')->name('about');
});
