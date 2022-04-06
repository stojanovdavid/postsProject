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
                    Categories:
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse ($categories as $category)
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-between">
                         <a href="/posts/{{ $category->id }}">{{ $category->name }}</a>
                         <div>
                            <form action="{{ route('category.delete', $category->id) }}" method="post" class="mb-2">
                                @csrf
                                @method('DELETE')
                                <a href="" class="text-red-500 mr-3"><input type="submit" name="delete" value="Delete Category"></a>
                            </form>
                         </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
