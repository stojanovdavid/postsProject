<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                       <h1 class="flex flex-col justify-center"> 
                        <span class="text-center text-indigo-600 font-semibold tracking-wide uppercase">
                            {{ $posts->title }}
                        </span>   
                        <span class="text-center text-3xl mt-3 mb-3 text-gray-900 font-extrabold tracking-tight">
                            {{ $posts->content }} 
                        </span>
                        <div class="text-right">
                            <p class="text-gray-400 mt-3">Views:</p>
                            <p>{{ $posts->views }}</p>
                        </div>
                       </h1> 
                       <p class="mt-10">Comments</p>
                       <hr class="mt-8 border-t-2 width-20 mx-auto">
                       <br>
                        <div class="w-full mx-auto flex justify-center">
                            <div class="flex flex-col">
                            @forelse ($posts->comments as $comment)
                                    <div class="flex">
                                        <p class="font-bold mr-2">{{ $comment->user->name }} </p> 
                                        <p class="text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                                        
                                       
                                    </div>
                                    <p class="mb-3">{{ $comment->content }}</p>
                                    
                                    
                                    @if ($comment->ownedBy(auth()->user()))
                                        <div class="flex">
                                            <form action="/comments/{{ $comment->id }}" method="post" class="mb-2">
                                                @csrf
                                                @method('DELETE')
                                                <a href="" class="text-red-500 mr-3"><input type="submit" name="delete" value="Delete Comment"></a>
                                            </form>
                                            <a href="/edit/comments/{{ $comment->id }}" class="text-green-600">Edit this comment</a>
                                        </div>
                                        @endif
                                        
                                
                                    @empty
                                    Comment section is empty
                                    @endforelse
                                    <hr class="mt-8 border-t-2 width-20 mx-auto">
                                </div>
                            </div>
                            <hr class="mt-8 border-t-2 width-20 mx-auto">    
                                @foreach ($posts->tags as $tag)
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 mt-5 px-4 rounded">
                                            <a href="/tag/{{ $tag->name }}">{{ '#' .  $tag->name }}</a>
                                        </button>
                                @endforeach
                    <div class="mt-10 flex justify-center">
                        <form action="/comments/{{ $posts->id }}" method="post">
                            @csrf
                            <textarea name="comment" id="comment" cols="30" rows="5" class="w-full"></textarea> <br>
                            <input type="submit" name="submit" value="Create Comment">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
