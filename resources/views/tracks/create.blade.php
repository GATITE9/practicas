<x-app-layout>
    <x-slot name="header">
        <div class=”flex justify-between”>
        <h2>
        Registrar nueva canción
        </h2>
        </div>
    </x-slot>
    <div>
        <form method="POST" action="{{ route('tracks.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title">
            @error('title')
            <div>{{ $message }}</div>
            @enderror
            <input type='file' name='audio' accept="audio/*">
            @error('audio')
            <div>{{ $message }}</div>
            @enderror
            <button type="submit" class="mt-3 text-lg font-semibold
            bg-gray-500 w-full">
            Registrar
            </button>
        </form>
    </div>
 </x-app-layout>