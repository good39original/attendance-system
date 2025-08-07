<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // ✅ 出勤処理
    public function clockIn(Request $request)
    {
        $user = Auth::user();

        // すでに未退勤の勤怠がある場合は拒否
        $existing = Attendance::where('user_id', $user->id)
            ->whereNull('clock_out')
            ->first();

        if ($existing) {
            return redirect()->route('dashboard')->with('status', '既に出勤中です。');
        }

        // 出勤記録を作成
        $attendance = Attendance::create([
            'user_id' => $user->id,
            'clock_in' => now('Asia/Tokyo'),
            'status' => '出勤中',
        ]);

        // 電車に乗り込むアニメーション表示ページへ
        return view('attendance.boarding');
    }

    // ✅ 出勤完了ページ（アニメーション後に遷移）
    public function clockInComplete()
    {
        return view('attendance.clockin-complete');
    }

    // ✅ 退勤処理
    public function clockOut(Request $request)
    {
        $user = Auth::user();

        // 出勤中の記録があるか確認
        $attendance = Attendance::where('user_id', $user->id)
            ->whereNull('clock_out')
            ->first();

        if (!$attendance) {
            return redirect()->route('dashboard')->with('status', '出勤中の記録がありません。');
        }

        // 退勤時間を記録
        $attendance->clock_out = now('Asia/Tokyo');
        $attendance->status = '退勤済み';
        $attendance->save();

        // 完了ページにリダイレクト（退勤完了時刻をセッションに保存）
        return redirect()->route('clockout.complete')->with('clockOutTime', $attendance->clock_out->format('Y-m-d H:i:s'));
    }

    // ✅ 退勤完了ページ
    public function clockOutComplete()
    {
        $clockOutTime = session('clockOutTime');
        return view('attendance.clockout-complete', compact('clockOutTime'));
    }

    // 勤怠履歴ページ表示（カレンダーや一覧用）
    public function history()
    {
        $user = Auth::user();

        // ユーザーの勤怠履歴を取得（日付でグルーピングではなく、全取得）
        $attendances = Attendance::where('user_id', $user->id)
            ->orderBy('clock_in', 'desc')
            ->get();

        return view('attendance.history', compact('attendances'));
    }
}


