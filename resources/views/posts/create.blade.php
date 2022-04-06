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
                    <form method="POST" action="{{ route('postcreate') }}">
                        @csrf
            
                        <!-- Name -->
                        <div >
                            <x-label for="title" :value="__('Title')" />
            
                            <x-input id="title" class="block mt-1 w-full @error('title') border-red-600 @enderror" type="text" name="title" :value="old('title')" required autofocus />
                            @error('title')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
            
                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="block mt-1 w-full @error('content') border-red-600 @enderror"></textarea>
                            @error('content')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <select name="categories[]" id="categories" multiple class="@error('categories') border-red-600 @enderror">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('categories')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="">Tags:</label> <br>
                            <input type="text" name="tags" id="tags" class="@error('tags') border-red-600 @enderror">
                            @error('tags')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
            
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Create a post') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
