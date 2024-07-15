<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\PatientDataController;
use App\Http\Controllers\Api\PatientDiabetesController;
use App\Http\Controllers\Api\FundAccountController;
use App\Http\Controllers\Api\InvoicesController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\UserAppointmentsController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ActivityRecommendationController;
use App\Http\Controllers\Api\DietaryRecommendationController;
use App\Http\Controllers\Api\PatientRatingFoodController;
use App\Http\Controllers\Api\PatientRatingActivityController;
use App\Http\Controllers\Api\ChatbotController;
use App\Http\Controllers\ZoomController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
| https://www.positronx.io/laravel-jwt-authentication-tutorial-user-login-signup-api/
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// users routes apis
Route::get('/users', [UsersController::class, 'index']);
Route::post('/users', [UsersController::class, 'store']);
Route::get('/users/{id}', [UsersController::class, 'show']);
Route::put('/users/{id}', [UsersController::class, 'update']);
Route::delete('/users/{id}', [UsersController::class, 'destroy']);

// patient data routes apis
Route::get('/patientdata', [PatientDataController::class, 'index']);
Route::get('/patientactivitydata', [PatientDataController::class, 'patientactivitydata']);
Route::post('/patientdata', [PatientDataController::class, 'store']);
Route::get('/patientdata/{id}', [PatientDataController::class, 'show']);
Route::put('/patientdata/{id}', [PatientDataController::class, 'update']);
Route::delete('/patientdata/{id}', [PatientDataController::class, 'destroy']);

// PatientDiabetesController routs apis
Route::get('/patientdiabetes', [PatientDiabetesController::class, 'index']);
Route::post('/patientdiabetes', [PatientDiabetesController::class, 'store']);
Route::get('/patientdiabetes/{id}', [PatientDiabetesController::class, 'show']);
Route::put('/patientdiabetes/{id}', [PatientDiabetesController::class, 'update']);
Route::delete('/patientdiabetes/{id}', [PatientDiabetesController::class, 'destroy']);

// doctors routes apis
Route::get('/doctors', [DoctorsController::class, 'index']);
Route::post('/doctors', [DoctorsController::class, 'store']);
Route::get('/doctors/{id}', [DoctorsController::class, 'show']);
Route::put('/doctors/{id}', [DoctorsController::class, 'update']);
Route::delete('/doctors/{id}', [DoctorsController::class, 'destroy']);

// Fund Account routes apis
Route::get('/fundaccount', [FundAccountController::class, 'index']);
Route::post('/fundaccount', [FundAccountController::class, 'store']);
Route::get('/fundaccount/{id}', [FundAccountController::class, 'show']);
Route::put('/fundaccount/{id}', [FundAccountController::class, 'update']);
Route::delete('/fundaccount/{id}', [FundAccountController::class, 'destroy']);

// Invoices routes apis
Route::get('/invoices', [InvoicesController::class, 'index']);
Route::post('/invoices', [InvoicesController::class, 'store']);
Route::get('/invoices/{id}', [InvoicesController::class, 'show']);
Route::put('/invoices/{id}', [InvoicesController::class, 'update']);
Route::delete('/invoices/{id}', [InvoicesController::class, 'destroy']);

// Section routes apis
Route::get('/section', [SectionController::class, 'index']);
Route::post('/section', [SectionController::class, 'store']);
Route::get('/section/{id}', [SectionController::class, 'show']);
Route::put('/section/{id}', [SectionController::class, 'update']);
Route::delete('/section/{id}', [SectionController::class, 'destroy']);

// UserAppointmentsController routes apis
Route::get('/UserAppointments', [UserAppointmentsController::class, 'index']);
Route::post('/UserAppointments', [UserAppointmentsController::class, 'store']);
Route::get('/UserAppointments/{id}', [UserAppointmentsController::class, 'show']);
Route::put('/UserAppointments/{id}', [UserAppointmentsController::class, 'update']);
Route::delete('/UserAppointments/{id}', [UserAppointmentsController::class, 'destroy']);

// AuthController routes apis
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/addPost', [AuthController::class, 'addPost']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// zoom
Route::post('/create-meeting', [ZoomController::class, 'createMeeting']);

// Dietary Recommendation api
Route::get('/food', [DietaryRecommendationController::class, 'index']);
Route::post('/food', [DietaryRecommendationController::class, 'store']);
Route::post('/insertMany', [DietaryRecommendationController::class, 'insertMany']);

// patient Rating Food api
Route::get('/patientRatingFood', [PatientRatingFoodController::class, 'index']);

// Activity Recommendation api
Route::get('/activity', [ActivityRecommendationController::class, 'index']);
Route::post('/activity', [ActivityRecommendationController::class, 'store']);
Route::post('/activity/insertMany', [ActivityRecommendationController::class, 'insertMany']);

// patient Rating Activity api
Route::get('/patientactivitydata', [PatientDataController::class, 'patientactivitydata']);
Route::get('/patientRatingactivity', [PatientRatingActivityController::class, 'index']);

// chatbot
Route::post('/chatbot/ask', [ChatbotController::class, 'searchWikipedia']);
