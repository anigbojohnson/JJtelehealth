<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ForgottenPasswordController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\CertificateController;
use App\Http\Controllers\Auth\PaymentController;

use App\Http\Controllers\Auth\AuthMicrosoftLoginController;
use App\Http\Controllers\Auth\MedicationController;

use App\Http\Controllers\Auth\AuthGoogleLoginController;
use App\Http\Controllers\Auth\AuthGoogleDriveController;
use App\Http\Controllers\Auth\WeightLostController;


use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    return view('auth.home');
});

Route::get('search-prescription', function () {
    return view('auth.search-prescription');
})->name('search-prescription');

Route::get('/weight-loss', function () {
    return view('auth.weight-lost-home');
})->name('weight-loss');

Route::get('/weight-loss-consultation/{param}/{action}', function ($param, $action) {
    if (Auth::check()) {
        $user = Auth::user();
        return view('auth.'.$action, ['param' => $param,'user'=>$user]);
    } else {
        return view('auth.not-registered-or-login', ['param' => $param,'action'=>$action]);
    }
})->name('weight-loss-consultation');





Route::get('certificate', function () {
    return view('auth.medical-certificate');
})->name('certificate');

// routes/web.php
Route::get('/medical-certificate/{param}/{action}', function ($param, $action) {
    if (Auth::check()) {
        $user = Auth::user();
        return view('auth.'.$action, ['param' => $param,'user'=>$user]);
    } else {
        return view('auth.not-registered-or-login', ['param' => $param,'action'=>$action]);
    }
})->name('medical-certificate');



Route::get('/telehealth-consultation/{param}/{action}', function ($param, $action) {
    if (Auth::check()) {
        $user = Auth::user();
        return view('auth.'.$action, ['param' => $param,'user'=>$user]);
    } else {
        return view('auth.not-registered-or-login', ['param' => $param,'action'=>$action]);
    }
})->name('telehealth-consultation');



Route::get('/telehealth', function () {
    return view('auth.doctor-consultation');
})->name('telehealth');


Route::get('/pathology', function () {
    return view('auth.blood-test');
});

Route::get('/specialist-referrals', function () {
    return view('auth.specialist-referral');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');


Route::post('/login/{param}/{action}', [LoginController::class, 'login'])->name('login');
Route::get('/login/{param}/{action}', [LoginController::class, 'loginForm'])->name('loginForm');

Route::get('/register', [RegisterController::class,'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/register', [RegisterController::class,'register'])->name('register');

Route::get('/change-password/{email}/{token}', [ForgottenPasswordController::class,'changePassword'])->name('change-password');
Route::post('/change-password/{email}/{token}', [ForgottenPasswordController::class,'saveChangedPassword'])->name('change-password');


Route::get('/verify-email/{email}/{token}', [VerifyEmailController::class,'send'])->name('send-verify-email');

Route::post('/forgotten-password', [ForgottenPasswordController::class,'send'])->name('forgotten-password');
 
Route::get('/auth/microsoft/redirect', [AuthMicrosoftLoginController::class, 'redirect'])->name('social-login');
Route::get('/auth/microsoft/callback', [AuthMicrosoftLoginController::class, 'callback'])->name('auth.microsoft.callback');

Route::get('/auth/google/redirect', [AuthGoogleLoginController::class, 'redirect'])->name('auth.google.redirect');
Route::get('/auth/google/callback', [AuthGoogleLoginController::class, 'callback'])->name('auth.google.callback');

Route::middleware(['auth'])->group(function () {
    Route::get('/weight-loss-payment', function () {
        return view('auth.weight-lost-home');
    })->name('weight-loss-payment');
    Route::post('/search-prescription', [MedicationController::class,'search'])->name('search-prescription');
    Route::post('/weight-loss-personal-details', [WeightLostController::class,'personalDetails'])->name('weight-loss-personal-details');
    Route::post('/weight-loss-consultation-details', [WeightLostController::class,'consultationDetails'])->name('weight-loss-consultation-details');
    Route::post('/weight-loss-medical-details', [WeightLostController::class,'medicalDetails'])->name('weight-loss-medical-details');
    Route::post('/submit-carer-leave-certificate', [CertificateController::class, 'careMC'])->name('submit-carer-leave-certificate');
    Route::post('/submit-travel-and-holiday-medical-certificate', [CertificateController::class, 'travelAndHoliday'])->name('submit-travel-and-holiday-medical-certificate');
    Route::post('/submit-work-medical-certificate', [CertificateController::class, 'work'])->name('submit-work-medical-certificate');
    Route::post('/submit-studies-medical-certificate', [CertificateController::class, 'studies'])->name('submit-studiies-medical-certificate');
    Route::post('/cancel', [PaymentController::class, 'cancel'])->name('cancel');
    Route::get('/success', [PaymentController::class, 'success'])->name('success');
    Route::get('/payment/{id}/{action}/{failLink}', [PaymentController::class, 'show'])->name('payment');
    Route::post('/payment', [PaymentController::class, 'make'])->name('payment');
    Route::get('/dashboard',[DashboardController::class,'index'] )->name('user.account');
});

Route::get('/auth/show-file-drives', [AuthGoogleDriveController::class, 'showProvider'])->name('show-google-drive');
Route::get('/auth/google-drive/redirect', [AuthGoogleDriveController::class, 'googleRedirect'])->name('auth.google-drive.redirect');
Route::get('/auth/google-drive/callback', [AuthGoogleDriveController::class, 'googleCallback'])->name('auth.google-drive.callback');
Route::post('/google-drive-downloaded-files', [AuthGoogleDriveController::class, 'downloadGoogleDriveFiles'])->name('google.drive.downloaded.files');

Route::get('/auth/dropbox/redirect', [AuthGoogleDriveController::class, 'dropboxRedirect'])->name('auth.dropbox.redirect');
Route::get('/auth/dropbox/callback', [AuthGoogleDriveController::class, 'dropboxCallback'])->name('auth.dropbox.callback');
Route::post('/dropbox-downloaded-files', [AuthGoogleDriveController::class, 'downloadDropboxFiles']);

