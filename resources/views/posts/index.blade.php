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
                    <div class="index-items">
                        <a class="link-items" href="{{route('posts.show', $search->id)}}">{{ $search->title }}</a>
                    <form action="{{  route('posts.destroy', $search->id )}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button 
                    type="submit"
                     onclick="return confirm('Are you sure?');" 
                    title="Delete" 
                    class="btn btn-sm btn-danger">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>
                    </button>

                    </form>
                    </div>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>