<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-400 leading-tight">
                {{ __('Track edit')}} 
            </h2>
            <a href="{{ route('tracks.index') }}" class="bg-green-600 py-2 px-4 rounded">
                {{ __('Tracks') }}
            </a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-purple-300 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="max-w-sm mx-auto px-6">
                        <div class="relative flex flex-wrap">
                            <div class="w-full relative">
                                <div class="md:my-6">

                                    @include('tracks.form')

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>