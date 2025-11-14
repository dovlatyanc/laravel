<x-main-layout>
    <x-slot:title>Роли и их пользователи</x-slot:title>

    <h1 class="text-2xl font-bold mb-6">Роли и их пользователи</h1>

    <ul class="space-y-4">
        @foreach($roles as $role)
            <li class="bg-white p-4 rounded-lg shadow border border-gray-200">
                <div class="font-semibold text-lg">{{ $role->name }}</div>
                <div class="text-gray-600">
                    Пользователи:
                    @if($role->users->count() > 0)
                        {{ $role->users->pluck('name')->join(', ') }}
                    @else
                        —
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</x-main-layout>