<x-main-layout>
    <x-slot:title>Все задачи</x-slot:title>

    <div class="bg-gray-100 p-6">
        <h1 class="text-2xl font-bold mb-6">Все задачи</h1>

        <div class="flex gap-3 mb-8">
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                ➕ Добавить задачу
            </a>
            <a href="{{ route('welcome') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                🏠 Главная
            </a>
        </div>

            <div class="space-y-4">
                @foreach($tasks as $task)
                    <a href="{{ route('tasks.show', $task->id) }}" class="block bg-white p-4 rounded-lg shadow hover:shadow-md transition cursor-pointer border border-transparent hover:border-blue-200">
                        <div class="text-sm text-gray-500">ID: {{ $task->id }}</div>
                        <div class="font-semibold text-gray-700">Срок: {{ \Carbon\Carbon::parse($task->due)->format('d.m.Y') }}</div>
                        <div class="text-lg font-medium text-blue-600 mt-1 hover:underline">
                            {{ $task->title }}
                        </div>
                    </a>
                @endforeach
            </div>
       
    </div>
</x-main-layout>