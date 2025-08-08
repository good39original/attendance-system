<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-900 dark:text-gray-100 mb-4">You're logged in!</p>

            @if($latestAttendance)
                <p class="text-white">最新の出勤時刻: <strong>{{ $latestAttendance->clock_in ? $latestAttendance->clock_in->format('Y-m-d H:i:s') : '未出勤' }}</strong></p>
                <p class="text-white">最新の退勤時刻: <strong>{{ $latestAttendance->clock_out ? $latestAttendance->clock_out->format('Y-m-d H:i:s') : '未退勤' }}</strong></p>
            @else
                <p class="text-white">勤怠記録がありません。</p>
            @endif

            {{-- 出勤ボタン --}}
            @if (!$latestAttendance || $latestAttendance->clock_out)
                <form method="POST" action="{{ route('clock.in') }}" class="mt-4">
                    @csrf
                    <x-primary-button>出勤する</x-primary-button>
                </form>
            @endif

            {{-- 退勤ボタン --}}
            @if ($latestAttendance && $latestAttendance->clock_in && !$latestAttendance->clock_out)
                <form method="POST" action="{{ route('clock.out') }}" class="mt-4">
                    @csrf
                    <x-primary-button>退勤する</x-primary-button>
                </form>
            @endif

            {{-- 履歴確認ボタン --}}
            <div class="mt-6">
                <a href="{{ route('attendance.history') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    履歴確認
                </a>
            </div>
        </div>
    </div>
</x-app-layout>