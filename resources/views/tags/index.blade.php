<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mt-5 px-4 rounded text-center">
                        {{ '#' .  $tags->name }}
                    </button>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                @forelse($tags->posts as $post)
                <div class="p-6 bg-white border-b border-gray-200 mb-4">
                    <p class="text-center text-4xl text-indigo-600 font-semibold tracking-wide uppercase">{{ $post->title }} </p><br>
                    <p class="text-center text-1xl mt-1 text-gray-900 font-extrabold tracking-tight">{{ $post->content }} </p><br>
                </div>
                @empty
                    No posts under this tag
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
