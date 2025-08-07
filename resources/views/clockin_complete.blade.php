<x-app-layout>
    <x-slot name="header">
        <h2>出勤完了</h2>
    </x-slot>

    <div class="p-6 text-center">
        <p class="text-lg font-semibold mb-4">出勤が完了しました！</p>
        <p>出勤時刻: {{ $clockInTime }}</p>
        <a href="{{ route('dashboard') }}" class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">ダッシュボードに戻る</a>
    </div>
</x-app-layout>

public function clockInComplete()
{
    return view('attendance.clockin-complete');
}