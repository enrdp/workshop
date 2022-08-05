<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3>Title:</h3>
                    <p>{{ $post->title }}</p>
                    <h3>Content</h3>
                    <p>{{ $post->content }}</p>
                    <figure class="resize">
                        <img src="{{ asset('storage/post/'.$post->file_path) }}" alt="{{$post->title}}" />
                    </figure>

                </div>

            </div>
        </div>
    </div>
    <a href="{{ redirect()->back()->getTargetUrl() }}" class="button-back bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">
        Back</a>
</x-app-layout>