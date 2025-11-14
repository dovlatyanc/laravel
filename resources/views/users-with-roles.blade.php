<x-main-layout>
    <x-slot:title>Пользователи и их роли</x-slot:title>

    <h1 class="text-2xl font-bold mb-6">Пользователи и их роли</h1>

    <ul class="space-y-4">
        @foreach($users as $user)
            <li class="bg-white p-4 rounded-lg shadow border border-gray-200">
                <div class="font-semibold text-lg">{{ $user->name }} ({{ $user->email }})</div>
                <div class="text-gray-600">
                    Роли:
                    @if($user->roles->count() > 0)
                        {{ $user->roles->pluck('name')->join(', ') }}
                    @else
                        —
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</x-main-layout>