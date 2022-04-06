<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 bg-white border-b border-gray-200">
                   @forelse ($categories->posts as $post)
                       <div class="post p-8 mb-4">
                        <p class="text-center text-4xl text-indigo-600 font-semibold tracking-wide uppercase">{{ $post->title }} </p><br>
                        <p class="text-center text-1xl mt-1 text-gray-900 font-extrabold tracking-tight">{{ $post->content }} </p><br>
                        <div class="bg-gray-100 p-2">
                            <div class="flex justify-between">
                                <div>
                                    Post by:{{ $post->user->name }} <br>
                                    <a href="/comments/{{ $post->id }}">View post</a>
                                </div>
                                @if ($post->ownedBy(auth()->user()))
                                    <div>
                                        <form action="/posts/{{ $post->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4" type="subit" name="deletepost">
                                                Delete
                                            </button>
                                        </form>
                                        <button class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            <a href="/posts/{{ $post->id }}/edit" class="">Edit post</a>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="flex items-center">
                                <form action="{{ route('post.like', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    <button type="submit" class="text-blue-500">Like</button>
                                </form>
                                <form action="{{ route('like.delete', $post->id) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                   <button type="submit" class="text-blue-500">Unlike</button>
                               </form>
                               <span>{{ $post->likes->count() }}  {{ Str::plural('like', $post->likes->count()) }}</span>
                            </div>
                       </div>
                        </div>
                       @empty
                       There are no posts
                   @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
