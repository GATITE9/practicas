<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2>
              Listado de canciones
            </h2>
            <a href="{{ route('tracks.create') }}" class="bg-blue-500 rounded px-4
                py-2">
                Nueva Canción
            </a>
        </div>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-8 gap-2">
                     @foreach($tracks as $track)
                        <div class="rounded bg-blue-200 p-4">
                            {{ $track->title }}
                            </div>
                            <div class="flex justify-center">
                            <audio controls>
                                <source src="{{ Storage::url($track->audio) }}">
                            </audio>
                            </div>
                            <div class="my-4 flex justify-between">
                                <a href="{{ route('tracks.edit', ['track' => $track]) }}" class="bg-purple-800 rounded px-4 py-2">
                                    {{ __('Update') }}
                                </a>
                                <form action="{{ route('tracks.destroy', ['track' => $track]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-900 rounded px-4 py-2">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                     @endforeach
            </div>
        </div>
    </div>
</x-app-layout>