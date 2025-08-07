<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            出勤中...
        </h2>
    </x-slot>

    <style>
        .train-container {
            position: relative;
            height: 200px;
            overflow: hidden;
            background: linear-gradient(to bottom, #a0c4ff, #ffffff);
        }

        .train {
            position: absolute;
            bottom: 0;
            left: -300px;
            width: 200px;
            height: 100px;
            background-color: #333;
            border-radius: 10px;
            animation: moveTrain 10s linear forwards;
        }

        .train::before {
            content: '🚆';
            font-size: 80px;
            position: absolute;
            left: 60px;
            top: -20px;
        }

        @keyframes moveTrain {
            from {
                left: -300px;
            }
            to {
                left: 100%;
            }
        }
    </style>

    <div class="train-container">
        <div class="train"></div>
    </div>

    <script>
        // 10秒後に完了ページへ遷移
        setTimeout(function() {
            window.location.href = "{{ route('clockin.complete') }}";
        }, 10000);
    </script>
</x-app-layout>

