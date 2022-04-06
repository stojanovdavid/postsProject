<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 flex justify-center">
                <form action="/edit/comments/{{ $comments->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="">Content:</label> <br>

                    <textarea name="editedcomment" id="" cols="30" rows="10" class="w-full">{{ $comments->content }}</textarea>
                    <input type="submit" name="submit" value="Edit Comment">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
