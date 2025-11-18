<div class="p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-xl font-bold mb-4">Назначить роль пользователю</h2>

    <!-- Сообщения об успехе/ошибке -->
    @if(session()->has('message'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('message') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit="assignRole" class="space-y-4">
        <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-1">Пользователь</label>
            <select wire:model="user_id" id="user_id" class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="">Выберите пользователя</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="role_id" class="block text-sm font-medium text-gray-700 mb-1">Роль</label>
            <select wire:model="role_id" id="role_id" class="w-full p-2 border border-gray-300 rounded-lg">
                <option value="">Выберите роль</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Добавить
        </button>
    </form>
</div>