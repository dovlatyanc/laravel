<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать,{{$name ?? ' Гость'}}!</title>
</head>
<body>
    <h1>Добро пожаловать ,{{$name ?? ' Гость'}}! </h1>
    <a href="{{ route('tasks.index') }}" class="flex-1 text-center py-2 px-4 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
        <button>Перейти ко всем задачам</button>
    </a>
</body>
</html>