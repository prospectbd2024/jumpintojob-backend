<?php

use App\Http\Controllers\api\v1\ApplicationController;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CandidateContactController;
use App\Http\Controllers\api\v1\CandidateController;
use App\Http\Controllers\api\v1\CategoryController;
use App\Http\Controllers\api\v1\CircularController;
use App\Http\Controllers\api\v1\CompanyController;
use App\Http\Controllers\api\v1\CVController;
use App\Http\Controllers\api\v1\EmployerController;
use App\Http\Controllers\api\v1\NotificationController;
use App\Http\Controllers\api\v1\PasswordResetController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('job-seeker/signup', [AuthController::class, 'jobSeekerSignup']);
    Route::post('employer/signup', [AuthController::class, 'employerSignup']);
    // Route::post('social-login', [AuthController::class, 'socialLogin']);
    Route::post('social-signin', [AuthController::class, 'socialSignIn']);
    Route::post('password/forget_request', [PasswordResetController::class, 'forgetRequest']);
    Route::post('password/confirm_reset', [PasswordResetController::class, 'confirmReset']);
    Route::post('password/resend_code', [PasswordResetController::class, 'resendCode']);
    Route::post('verification_code/resend_code', [AuthController::class, 'resendCode']);
    Route::post('confirm_code', [AuthController::class, 'confirmCode'])->middleware(['auth:sanctum']);
    Route::get('account/{user_id}/verify/{code}', [AuthController::class, 'accountVerification'])->name('accountVerification');
});


Route::middleware('auth:sanctum')->group(function () {
// user section
    Route::get('user', [AuthController::class, 'user']);
    Route::get('user/isBanned', [AuthController::class, 'isBanned']);
    Route::get('user/isVerified', [AuthController::class, 'isVerified']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('account-deletion', [AuthController::class, 'accountDeletion']);

    Route::middleware('isEmailVerified')->group(function () {
//cv section
        Route::group(['prefix' => 'cv'], function () {
            Route::post('create', [CVController::class, 'create']);
            Route::put('update/{id}', [CVController::class, 'update']);
            Route::delete('delete/{Cv}', [CVController::class, 'delete']);
            Route::get('get', [CVController::class, 'getUserCvList']);
            Route::get('get/all-details/{Cv}', [CVController::class, 'getCvDetails']);
        });


        Route::prefix('company')->group(function () {

            Route::get('/', [CompanyController::class, 'index'])->name('company.index');

            Route::get('show/{slug}', [CompanyController::class, 'show_slug'])->name('company.show');

            Route::post('store', [CompanyController::class, 'store'])->name('company.store');

            Route::put('update/{company}', [CompanyController::class, 'update'])->name('company.update');

            Route::delete('destroy/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');

        });

        Route::prefix('employer')->group(function () {

            Route::get('/', [EmployerController::class, 'index'])->name('employer.index');

            Route::get('show/{slug}', [EmployerController::class, 'show'])->name('employer.show');

            Route::post('store', [EmployerController::class, 'store'])->name('employer.store');

            Route::put('update/{employer}', [EmployerController::class, 'update'])->name('employer.update');

            Route::delete('destroy/{employer}', [EmployerController::class, 'destroy'])->name('employer.destroy');

        });

        Route::middleware('isEmployer')->prefix('circular')->group(function () {

            Route::post('store', [CircularController::class, 'store'])->name('circular.store');

            Route::put('update/{circular}', [CircularController::class, 'update'])->name('circular.update');

            Route::delete('destroy/{circular}', [CircularController::class, 'destroy'])->name('circular.destroy');

        });
    });
});

// public section
Route::prefix('circular')->group(function () {
    Route::get('/', [CircularController::class, 'index'])->name('circular.index');
    Route::get('show/{id}', [CircularController::class, 'show'])->name('circular.getCircular');
    Route::get('{company}/{slug}', [CircularController::class, 'getCircular'])->name('circular.show');
});

Route::get('companies', [CompanyController::class, 'index'])->name('company.list');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.list');

Route::get('employers', [EmployerController::class, 'index'])->name('employer.list');

Route::prefix('notification')->group(function () {

            Route::get('/', [NotificationController::class, 'index'])->name('notification.index');

            Route::get('show/{slug}', [NotificationController::class, 'show'])->name('notification.show');

            Route::post('store/{notification}', [NotificationController::class, 'store'])->name('notification.store');

            Route::put('update/{notification}', [NotificationController::class, 'update'])->name('notification.update');

            Route::delete('destroy/{notification}', [NotificationController::class, 'destroy'])->name('notification.destroy');

        });

Route::prefix('application')->group(function () {
            Route::get('/', [ApplicationController::class, 'index'])->name('application.index');
            Route::get('show/{slug}', [ApplicationController::class, 'show'])->name('application.show');
            Route::post('store', [ApplicationController::class, 'store'])->name('application.store');
            Route::put('update/{application}', [ApplicationController::class, 'update'])->name('application.update');
            Route::delete('destroy/{application}', [ApplicationController::class, 'destroy'])->name('application.destroy');
        });

Route::prefix('candidate')->group(function () {
            Route::get('/', [CandidateController::class, 'index'])->name('candidate.index');
            Route::get('show/{slug}', [CandidateController::class, 'show'])->name('candidate.show');
            Route::post('store', [CandidateController::class, 'store'])->name('candidate.store');
            Route::put('update/{candidate}', [CandidateController::class, 'update'])->name('candidate.update');
            Route::delete('destroy/{candidate}', [CandidateController::class, 'destroy'])->name('candidate.destroy');
        });

Route::prefix('candidate-contact')->group(function () {
            Route::get('/', [CandidateContactController::class, 'index'])->name('candidate-contact.index');
            Route::get('show/{slug}', [CandidateContactController::class, 'show'])->name('candidate-contact.show');
            Route::post('store', [CandidateContactController::class, 'store'])->name('candidate-contact.store');
            Route::put('update/{candidate-contact}', [CandidateContactController::class, 'update'])->name('candidate-contact.update');
            Route::delete('destroy/{candidate-contact}', [CandidateContactController::class, 'destroy'])->name('candidate-contact.destroy');
        });
