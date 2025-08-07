<x-app-layout>
    <x-slot name="header">
        <h2>退勤完了</h2>
    </x-slot>

    <div class="p-6 text-center">
        <p class="text-lg font-semibold mb-4">退勤が完了しました！</p>
        <p>退勤時刻: {{ $clockOutTime }}</p>
        <a href="{{ route('dashboard') }}" class="inline-block mt-6 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">ダッシュボードに戻る</a>
    </div>
</x-app-layout>
