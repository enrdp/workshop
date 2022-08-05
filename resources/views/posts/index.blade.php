<x-app-layout>
    <x-slot name="header">
        <div class="header-item">
        <h2 class="h2-item font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
        <form class="form-search" action="{{ route('posts.index') }}" method="GET">
        <label class="search-bar-label">
            <input type="text" name="search" required class="search-bar-input" />
        </label>
        <button type="submit" class="px-6
      py-2.5
      bg-blue-600
      text-white
      font-medium
      text-xs
      leading-tight
      uppercase
      rounded
      shadow-md
      hover:bg-blue-700 hover:shadow-lg
      focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
      active:bg-blue-800 active:shadow-lg
      transition
      duration-150
      ease-in-out">Search</button>
    </form>
    </div>
    </x-slot>
   
    <div class="py-12">
    

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($searchs as $search)
                    <p><a href="{{route('posts.show', $search->id)}}">{{ $search->title }}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>