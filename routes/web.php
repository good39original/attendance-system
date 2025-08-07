<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;

// トップページ（ログインしていない状態でのアクセス）
Route::get('/', function () {
    return view('welcome');
});

// 認証・メール認証済みユーザーのみが使えるルート
Route::middleware(['auth', 'verified'])->group(function () {

    // ダッシュボード
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // プロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 勤怠（打刻）関連
    Route::post('/clock-in', [AttendanceController::class, 'clockIn'])->name('clock.in');
    Route::post('/clock-out', [AttendanceController::class, 'clockOut'])->name('clock.out');

    // 打刻後の完了画面
    Route::get('/clockin-complete', [AttendanceController::class, 'clockInComplete'])->name('clockin.complete');
    Route::get('/clockout-complete', [AttendanceController::class, 'clockOutComplete'])->name('clockout.complete');

    // ステータス更新（任意）
    Route::post('/status-update', [AttendanceController::class, 'updateStatus'])->name('status.update');

    // 勤怠編集
    Route::get('/attendances/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
    Route::put('/attendances/{attendance}', [AttendanceController::class, 'update'])->name('attendances.update');

    // 勤怠履歴ページ（カレンダー/一覧など）
    Route::get('/attendance/history', [AttendanceController::class, 'history'])->name('attendance.history');
});

// 認証ルート（Laravel BreezeやJetstream用）
require __DIR__.'/auth.php';
