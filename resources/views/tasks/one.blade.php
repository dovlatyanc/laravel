<x-main-layout>
     <x-slot:title>{{$task->title}}</x-slot>
    <body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md border border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Детали задачи</h1>

            <div class="space-y-4">
                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-500">ID</span>
                    <span class="text-lg font-mono text-gray-900">{{ $task->id }}</span>
                </div>

                <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                    <span class="text-sm font-medium text-gray-500">Срок выполнения</span>
                    <span class="text-lg font-semibold text-blue-600">{{ $task->due }}</span>
                </div>

                <div class="pt-2">
                    <span class="text-sm font-medium text-gray-500 block mb-2">Название задачи</span>
                    <p class="text-xl font-medium text-gray-900 break-words">{{ $task->title }}</p>
                </div>
            </div>
            <div>
                <a href="{{ route('tasks.edit', $task->id) }}" class="text-center border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    <button>Редактировать задачу</button>
                </a>
                <a href="{{ route('tasks.index') }}" class="text-center border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                      <button>Назад к списку</button>
                </a>
            </div>
        </div>
    </body>
</x-main-layout>