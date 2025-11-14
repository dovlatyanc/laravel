<x-main-layout>
    <x-slot:title>Профиль</x-slot>

    <h1>Профиль</h1>

    <h2>{{ $user->name }}</h2>
    <h2>{{ $profile->telegram }}</h2>
    <h2>{{ $profile->phone }}</h2>
    <h2>{{ $profile->vk }}</h2>
    @foreach($posts as $post )
        <h2>{{ $post->title }}</h2>
        <h2>{{ $post->content }}</h2>
        <h2>{{ $post->created_at }}</h2>
    @endforeach
</x-main-layout>