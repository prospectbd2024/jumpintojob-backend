<?php

use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\EmployerController;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\CircularController;
use App\Http\Controllers\api\v1\CVController;
use App\Http\Controllers\api\v1\EducationController;
use App\Http\Controllers\api\v1\PasswordResetController;
use App\Http\Controllers\api\v1\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::post('user/login', [AuthController::class, 'login']);
    Route::post('job-seeker/signup', [AuthController::class, 'jobSeekerSignup']);
    Route::post('employer/signup', [AuthController::class, 'employerSignup']);
    Route::post('social-login', [AuthController::class, 'socialLogin']);
    Route::post('password/forget_request', [PasswordResetController::class, 'forgetRequest']);
    Route::post('password/confirm_reset', [PasswordResetController::class, 'confirmReset']);
    Route::post('password/resend_code', [PasswordResetController::class, 'resendCode']);
    Route::post('resend_code', [AuthController::class, 'resendCode']);
    Route::post('confirm_code', [AuthController::class, 'confirmCode']);
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
//profile section
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [ProfileController::class, 'getUserProfile']);
            Route::put('update', [ProfileController::class, 'updateProfile']);
        });

//cv section
        Route::group(['prefix' => 'cv'], function () {
            Route::post('create', [CVController::class, 'createCV']);
            Route::put('update/{id}', [CVController::class, 'update']);
            Route::delete('delete/{CV}', [CVController::class, 'deleteCV']);
            Route::get('get', [CVController::class, 'getUserCVs']);
            Route::get('get/all-details/{CV}', [CVController::class, 'getCVDetails']);
        });

// Education Routes
        Route::group(['prefix' => 'education'], function () {
            Route::post('add/{education}', [EducationController::class, 'addEducation']);
            Route::post('get/{education}', [EducationController::class, 'getEducation']);
            Route::put('update/{education}', [EducationController::class, 'updateEducation']);
            Route::delete('delete/{education}', [EducationController::class, 'deleteEducation']);
        });
//
//// Experience Routes
// Route::group(['prefix' => 'cv/experience'], function () {
//        // Add experience to a CV
//        Route::post('add/{cv}', [ExperienceController::class, 'addExperience']);
//
//        // Update experience
//        Route::put('experience/{experience}', [ExperienceController::class, 'updateExperience']);
//
//        // Delete experience
//        Route::delete('experience/{experience}', [ExperienceController::class, 'deleteExperience']);
//    });
//
//// Skills Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add skill to a CV
//        Route::post('cv/{cv}/skills', [SkillsController::class, 'addSkill']);
//
//        // Update skill
//        Route::put('skills/{skill}', [SkillsController::class, 'updateSkill']);
//
//        // Delete skill
//        Route::delete('skills/{skill}', [SkillsController::class, 'deleteSkill']);
//    });
//
//// Projects Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add project to a CV
//        Route::post('cv/{cv}/projects', [ProjectsController::class, 'addProject']);
//
//        // Update project
//        Route::put('projects/{project}', [ProjectsController::class, 'updateProject']);
//
//        // Delete project
//        Route::delete('projects/{project}', [ProjectsController::class, 'deleteProject']);
//    });
//
//// Languages Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add language to a CV
//        Route::post('cv/{cv}/languages', [LanguagesController::class, 'addLanguage']);
//
//        // Update language
//        Route::put('languages/{language}', [LanguagesController::class, 'updateLanguage']);
//
//        // Delete language
//        Route::delete('languages/{language}', [LanguagesController::class, 'deleteLanguage']);
//    });
//
//// Certifications Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add certification to a CV
//        Route::post('cv/{cv}/certifications', [CertificationsController::class, 'addCertification']);
//
//        // Update certification
//        Route::put('certifications/{certification}', [CertificationsController::class, 'updateCertification']);
//
//        // Delete certification
//        Route::delete('certifications/{certification}', [CertificationsController::class, 'deleteCertification']);
//    });
//
//// Awards Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add award to a CV
//        Route::post('cv/{cv}/awards', [AwardsController::class, 'addAward']);
//
//        // Update award
//        Route::put('awards/{award}', [AwardsController::class, 'updateAward']);
//
//        // Delete award
//        Route::delete('awards/{award}', [AwardsController::class, 'deleteAward']);
//    });
//
//// Publications Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add publication to a CV
//        Route::post('cv/{cv}/publications', [PublicationsController::class, 'addPublication']);
//
//        // Update publication
//        Route::put('publications/{publication}', [PublicationsController::class, 'updatePublication']);
//
//        // Delete publication
//        Route::delete('publications/{publication}', [PublicationsController::class, 'deletePublication']);
//    });
//
//// Interests Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add interest to a CV
//        Route::post('cv/{cv}/interests', [InterestsController::class, 'addInterest']);
//
//        // Update interest
//        Route::put('interests/{interest}', [InterestsController::class, 'updateInterest']);
//
//        // Delete interest
//        Route::delete('interests/{interest}', [InterestsController::class, 'deleteInterest']);
//    });
//
//// References Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add reference to a CV
//        Route::post('cv/{cv}/references', [ReferencesController::class, 'addReference']);
//
//        // Update reference
//        Route::put('references/{reference}', [ReferencesController::class, 'updateReference']);
//
//        // Delete reference
//        Route::delete('references/{reference}', [ReferencesController::class, 'deleteReference']);
//    });
//
//// Volunteer Experience Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add volunteer experience to a CV
//        Route::post('cv/{cv}/volunteer-experience', [VolunteerExperienceController::class, 'addVolunteerExperience']);
//
//        // Update volunteer experience
//        Route::put('volunteer-experience/{volunteer_experience}', [VolunteerExperienceController::class, 'updateVolunteerExperience']);
//
//        // Delete volunteer experience
//        Route::delete('volunteer-experience/{volunteer_experience}', [VolunteerExperienceController::class, 'deleteVolunteerExperience']);
//    });
//
//// Courses Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add course to a CV
//        Route::post('cv/{cv}/courses', [CoursesController::class, 'addCourse']);
//
//        // Update course
//        Route::put('courses/{course}', [CoursesController::class, 'updateCourse']);
//
//        // Delete course
//        Route::delete('courses/{course}', [CoursesController::class, 'deleteCourse']);
//    });
//
//// Languages Routes
//    Route::middleware('auth:sanctum')->group(function () {
//        // Add language to a CV
//        Route::post('cv/{cv}/languages', [LanguagesController::class, 'addLanguage']);
//
//        // Update language
//        Route::put('languages/{language}', [LanguagesController::class, 'updateLanguage']);
//
//        // Delete language
//        Route::delete('languages/{language}', [LanguagesController::class, 'deleteLanguage']);
//    });


        Route::prefix('company')->group(function () {

            Route::get('/', [CompanyController::class, 'index'])->name('company.index');

            Route::get('show/{slug}', [CompanyController::class, 'show'])->name('company.show');

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
Route::prefix('circular')->group(function () {
    Route::get('/', [CircularController::class, 'index'])->name('circular.index');
    Route::get('{company}/{slug}', [CircularController::class, 'show'])->name('circular.show');
});


