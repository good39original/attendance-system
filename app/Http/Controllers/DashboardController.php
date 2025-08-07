<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // 最新の勤怠記録（出勤・退勤両方含む）
        $latestAttendance = $user->attendances()
            ->orderBy('clock_in', 'desc')
            ->first();

        // 当日まだ退勤していない出勤中のユーザー一覧
        $attendingUsers = Attendance::whereNull('clock_out')
            ->whereDate('clock_in', now('Asia/Tokyo')->toDateString())
            ->with('user')
            ->get();

        // 全勤怠記録（ユーザー本人分）
        $attendances = $user->attendances()
            ->orderBy('clock_in', 'desc')
            ->get();

        return view('dashboard', compact('latestAttendance', 'attendingUsers', 'attendances'));
    }
}
