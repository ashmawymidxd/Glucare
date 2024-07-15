<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\WebsiteController;
use App\Http\Controllers\Website\PatientDataController;
use App\Http\Controllers\Website\PatientDiabetesController;
use App\Http\Controllers\Website\DietaryRecommendationController;
use App\Http\Controllers\Website\MedicalInformationController;
use App\Http\Controllers\Website\ActivityRecommendationController;
use App\Http\Controllers\Website\NotificationController;
use App\Http\Controllers\Website\PatientInvoicesController;
use App\Http\Controllers\Website\ChatController;
use App\Http\Controllers\Website\AppointmentController;
use App\Http\Controllers\Website\MailController;
use App\Http\Controllers\Website\DoctorsController;
use App\Http\Controllers\Website\PatientRatingDoctorsController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Livewire\Chat\Index;
use App\Http\Livewire\Chat\Chat;
use App\Http\Livewire\Users;
use App\Http\Controllers\Website\PatientHistoryController;

use App\Http\Controllers\patientDoctorMessageController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        Route::get('/', function () {
            return view('welcome');
        });

        // Route::middleware('auth:web','verified')->group(function(){
        Route::middleware(['auth:web','CheckPatientStatus'])->group(function(){

            // home pages routs
            Route::get('/website/user', [WebsiteController::class, 'index'])->name('website.user');
            Route::get('/website/user/medicalinfo', [WebsiteController::class, 'medicalInfo'])->name('website.user.medicalinfo');
            Route::get('/website/user/contact', [WebsiteController::class, 'contact'])->name('website.user.contact');

            // get start routs
            Route::resource('getstart',PatientDataController::class);
            // paietent diabetes data
            Route::resource('patientdiabetesreport',PatientDiabetesController::class);
            //Dietary Recommendation
            Route::resource('dietary',DietaryRecommendationController::class);
            //Activity Recommendation
            Route::resource('activity',ActivityRecommendationController::class);
            //Appointment
            Route::resource('appointment',AppointmentController::class);
            Route::get('/userAppointments', [AppointmentController::class, 'getUserAppointments'])->name('userAppointments');
            // chatbot rout
            Route::get('/chatbot', [ChatController::class, 'chatbot'])->name('chat.chatbot');
            // chat users rout
            Route::get('/users',[ChatController::class, 'users'])->name('chat.users');
            // send an email routs
            Route::post('/send-email', [MailController::class, 'sendEmail'])->name('send.email');
            // user routs
            Route::resource('user', UserController::class);
            // this routs to read all notification
            Route::get('MarkAsRead_all', [PatientDataController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
            // this routs to read one notification
            Route::resource('notifications',NotificationController::class);
            // Doctor routs
            Route::resource('doctors_website',DoctorsController::class);
            // get doctors by department ajax
            Route::get('get-doctors/{department}', [DoctorsController::class, 'getDoctorsByDepartment'])->name('get-doctors');
            // Medical Information
            Route::get('/search/{query}', [MedicalInformationController::class, 'search'])->name('search');
            Route::post('/rating_store',[PatientRatingDoctorsController::class,'store'])->name('rating_store');

            Route::get('/chat',Index::class)->name('chat.index');
            Route::get('/chat/{query}',Chat::class)->name('chat');
            Route::get('/users',Users::class)->name('users');

            Route::get('/blogPosts',function(){
                return view('livewire.blog.index');
            });
            Route::get('/todo',function(){return view('livewire.todo-list');});

            Route::get('/dietaryList',function(){
                return view('livewire.dietary.list');
            })->name('dietaryList');

            Route::get('/activityList',function(){
                return view('livewire.activity.list');
            })->name('activityList');

            Route::get('/dietaryHistoryList',[PatientHistoryController::class,'dietaryHistory'])->name('dietaryHistory');
            Route::get('/activityHistoryList',[PatientHistoryController::class,'activityHistory'])->name('activityHistory');

            Route::get('/patient_doctor_message/{id}',[patientDoctorMessageController::class,'patient']);
            Route::get('/showInvoices/{id}',[PatientInvoicesController::class,'showInvoices']);

        });
    });


// require __DIR__.'/auth.php';
