<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\PhDStudentController;
use App\Http\Controllers\ReviewerController;
use App\Http\Controllers\ConferenceController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/professor/dashboard', [ProfessorController::class, 'dashboard'])->name('professor.dashboard');
    Route::post('send-invitation/{paper}', [ProfessorController::class, 'sendInvitation'])->name('professor.send-invitation');

    Route::get('/phd-student/dashboard', [PhDStudentController::class, 'dashboard'])->name('phd-student.dashboard');
    Route::post('/phd-student/submit-paper', [PhDStudentController::class, 'submitPaper'])->name('phd-student.submit-paper');
    
    Route::get('/reviewer/dashboard', [ReviewerController::class, 'dashboard'])->name('reviewer.dashboard');
    Route::post('/reviewer/accept-invitation/{review}', [ReviewerController::class, 'acceptInvitation'])->name('reviewer.accept-invitation');
    Route::get('/reviewer/submit-review/{review}', [ReviewerController::class, 'dashboard'])->name('reviewer.review');
    Route::post('/reviewer/submit-review/{review}', [ReviewerController::class, 'submitReview'])->name('reviewer.submit-review');
    Route::get('/invitations/{token}', [ReviewerController::class, 'handleInvitation'])->name('reviewer.handle-invitation');

    Route::resource('conferences', ConferenceController::class);
});

            
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('professors', AdminController::class);
});