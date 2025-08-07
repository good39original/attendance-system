<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            勤怠履歴
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            @if($attendances->isEmpty())
                <p class="text-white">勤怠履歴がありません。</p>
            @else
                <table class="min-w-full table-auto border-collapse border border-gray-600">
                    <thead>
                        <tr>
                            <th class="border border-gray-600 px-4 py-2 text-white">出勤日時</th>
                            <th class="border border-gray-600 px-4 py-2 text-white">退勤日時</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attendances as $attendance)
                        <tr>
                            <td class="border border-gray-600 px-4 py-2 text-white">{{ $attendance->clock_in ? $attendance->clock_in->format('Y-m-d H:i:s') : '-' }}</td>
                            <td class="border border-gray-600 px-4 py-2 text-white">{{ $attendance->clock_out ? $attendance->clock_out->format('Y-m-d H:i:s') : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
