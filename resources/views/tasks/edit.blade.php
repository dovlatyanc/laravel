<x-main-layout>
    <x-slot:title>
        {{ isset($task) ? $task->title : 'Новая задача' }}
    </x-slot:title>

    <div class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md border border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                {{ isset($task) ? 'Редактировать задачу' : 'Добавить задачу' }}
            </h1>

            @if(isset($task))
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @method('PUT')
            @else
                <form action="{{ route('tasks.store') }}" method="POST">
            @endif

                @csrf

                <div class="space-y-4">
                    @if(isset($task))
                        <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                            <span class="text-sm font-medium text-gray-500">ID</span>
                            <span class="text-lg font-mono text-gray-900">{{ $task->id }}</span>
                        </div>
                    @endif

                    <div>
                        <label for="due" class="block text-sm font-medium text-gray-500 mb-1">Срок выполнения</label>
                        <input
                            type="date"
                            name="due"
                            id="due"
                            value="{{ old('due', $task->due ?? '') }}"
                            class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required
                        >
                    </div>

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-500 mb-1">Название задачи</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title', $task->title ?? '') }}"
                            class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required
                        >
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit" class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                            {{ isset($task) ? 'Сохранить' : 'Добавить' }}
                        </button>
                        <a href="{{ route('tasks.index') }}" class="flex-1 text-center py-2 px-4 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                            Отмена
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main-layout>