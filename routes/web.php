<?php

use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ResultReceiptController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login-page');
});
Route::get('/first-home-page', function () {
    echo "<script type = 'text/javascript'> window.location.replace('/')</script>";
});
Route::get('/captchaReload',[CaptchaController::class, 'captchaReload']);
Route::get('/forgot-password-page',[function(){return view('small-files/forgotPassword');}]);
Route::get('/login-page-box',[function(){return view('small-files/login-box');}]);
Route::post('/login_credentials',[CaptchaController::class, 'login_user_func']);

Route::get('/dashboard-home-page',[DashboardController::class, 'dashboard_func'])->middleware(['session_guard', 'session_time']);

// graphAndMessage
Route::get('/dashboard-front-ui',[DashboardController::class, 'dashboard_frontUI_func'])->middleware(['session_guard', 'session_time']);

Route::get('/academic-registration',[DashboardController::class, 'dashboard_academic_reg_func'])->middleware(['session_guard', 'session_time']);

Route::get('/user-attendance-page',[AttendanceController::class, 'attendance_user_func'])->middleware(['session_guard', 'session_time']);
Route::get('/select-att-user',[AttendanceController::class, 'select_attendance_subject'])->middleware(['session_guard', 'session_time']);

Route::get('/user-password-change',[DashboardController::class, 'password_change_func'])->middleware(['session_guard', 'session_time']);

Route::post('/password-check-change',[DashboardController::class, 'password_change_check_function'])->middleware(['session_guard', 'session_time']);

Route::get('/log-out-user',[DashboardController::class, 'user_logout_func']);

Route::get('/registration-receipt-page',[ResultReceiptController::class, 'result_receipt_function'])->middleware(['session_guard', 'session_time']);

Route::get('/monthly-exam-page',[ResultReceiptController::class, 'exam_result_function'])->middleware(['session_guard', 'session_time']);




