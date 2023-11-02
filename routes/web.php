<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ResultReceiptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login-page');
});
Route::get('/captchaReload',[CaptchaController::class, 'captchaReload']);
Route::get('/forgot-password-page',[function(){return view('small-files/forgotPassword');}]);
Route::get('/login-page-box',[function(){return view('small-files/login-box');}]);
Route::post('/login_credentials',[CaptchaController::class, 'login_user_func']);

Route::get('/dashboard-home-page',[DashboardController::class, 'dashboard_func']);

// graphAndMessage
Route::get('/dashboard-front-ui',[DashboardController::class, 'dashboard_frontUI_func']);

Route::get('/academic-registration',[DashboardController::class, 'dashboard_academic_reg_func']);

Route::get('/user-attendance-page',[AttendanceController::class, 'attendance_user_func']);
Route::get('/select-att-user',[AttendanceController::class, 'select_attendance_subject']);

Route::get('/user-password-change',[DashboardController::class, 'password_change_func']);

Route::post('/password-check-change',[DashboardController::class, 'password_change_check_function']);

Route::get('/log-out-user',[DashboardController::class, 'user_logout_func']);

Route::get('/registration-receipt-page',[ResultReceiptController::class, 'result_receipt_function']);