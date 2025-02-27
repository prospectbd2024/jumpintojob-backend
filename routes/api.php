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
use App\Http\Controllers\api\v1\LanguagesController;
use App\Http\Controllers\api\v1\NotificationController;
use App\Http\Controllers\api\v1\PasswordResetController;
use App\Http\Controllers\api\v1\SkillsController;
use App\Http\Controllers\api\v1\TemplateController;
use App\Http\Controllers\BookMarkController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('user/login', [AuthController::class, 'login'])->name('login');
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
    Route::put('user/update', [AuthController::class, 'update']);
    Route::get('user/isBanned', [AuthController::class, 'isBanned']);
    Route::get('user/isVerified', [AuthController::class, 'isVerified']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('account-deletion', [AuthController::class, 'accountDeletion']);

    Route::middleware('isJobSeeker')->prefix('profile')->group(function () {
        Route::get('/{userId}', [ProfileController::class, 'show']);
        Route::get('/{userId}/resume', [ProfileController::class, 'showResume']);
        Route::put('update/{id}', [ProfileController::class, 'update']);
    });

    Route::middleware('isEmailVerified')->group(function () {
        Route::prefix('company')->group(function () {

            Route::get('/', [CompanyController::class, 'index'])->name('company.index');

            Route::get('show/{slug}', [CompanyController::class, 'show_slug'])->name('company.show');

            Route::post('store', [CompanyController::class, 'store'])->name('company.store');

            Route::put('update/{company}', [CompanyController::class, 'update'])->name('company.update');

            Route::delete('destroy/{company}', [CompanyController::class, 'destroy'])->name('company.destroy');
        });

        Route::prefix('employer')->group(function () {
            Route::get('/jobs', [CircularController::class, 'employerjobs']);
            Route::get('/jobs-with-applicants', [CircularController::class, 'indexWithApplicants']);


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
    Route::get('/search', [CircularController::class, 'search'])->name('circular.search');
    Route::get('featured-jobs', [CircularController::class, 'featuredCircular'])->name('circular.featured');
    Route::get('show/{id}', [CircularController::class, 'show'])->name('circular.getCircular');
    Route::get('{company}/{slug}', [CircularController::class, 'getCircular'])->name('circular.show');

});
Route::prefix('companies')->group(function () {
    Route::get('/', [CompanyController::class, 'index'])->name('company.list');
    Route::get('featured', [CompanyController::class, 'featuredCompanies'])->name('company.featured');
    Route::get('/{slug}/circulars', [CircularController::class, 'getCompanyCirculars'])->name('circular.companyCirculars');
});
Route::get('languages', [LanguagesController::class, 'index'])->name('languages.list');
Route::get('languages/search/{searchKey}', [LanguagesController::class, 'search'])->name('languages.search');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.list');

Route::get('skills', [SkillsController::class, 'index'])->name('skills.list');
Route::get('skills/suggested', [SkillsController::class, 'suggested'])->name('skills.suggested');
Route::get('skills/search/{searchKey}', [SkillsController::class, 'search'])->name('skills.search');

Route::get('employers', [EmployerController::class, 'index'])->name('employer.list');

Route::prefix('notification')->group(function () {

    Route::get('/', [NotificationController::class, 'index'])->name('notification.index');

    Route::get('show/{slug}', [NotificationController::class, 'show'])->name('notification.show');

    Route::post('store/{notification}', [NotificationController::class, 'store'])->name('notification.store');

    Route::put('update/{notification}', [NotificationController::class, 'update'])->name('notification.update');

    Route::delete('destroy/{notification}', [NotificationController::class, 'destroy'])->name('notification.destroy');
});

Route::prefix('applications')->group(function () {
    Route::get('/', [JobApplicationController::class, 'index'])->name('application.index')->middleware(['auth:sanctum']);


    Route::post('/apply-for-job', [JobApplicationController::class,'apply'])->middleware(['auth:sanctum']);
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
Route::prefix('templates')->group(function () {
    Route::get('/', [TemplateController::class, 'index'])->name('templates.index');
    Route::post('/generator', [TemplateController::class, 'templateGenerator'])->name('templates.templateGenerator');

});


Route::prefix('cv')->group(function (){
    Route::get('/{user_id}', [CVController::class,'getCV']);
    Route::post('/store', [CVController::class,'saveCV'])->middleware(['auth:sanctum']);
});

Route::group(['prefix' => 'bookmark'], function () {
    Route::get('/{user_id}', [BookMarkController::class, 'getBookMark']);
    Route::put('/{user_id}/update', [BookMarkController::class, 'updateBookMark']);
});