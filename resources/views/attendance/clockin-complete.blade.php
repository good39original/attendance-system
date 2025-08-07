<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            出勤完了！
        </h2>
    </x-slot>

    <div class="p-6">
        <p class="text-lg text-gray-900 dark:text-gray-100">電車に乗って出勤完了しました🚆✨</p>
        <a href="{{ route('dashboard') }}" class="text-white underline mt-4 inline-block">ダッシュボードに戻る</a>
    </div>
</x-app-layout>
