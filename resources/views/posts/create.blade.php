<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    @if ($errors->any())
   <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
     @endforeach
     </ul>
   </div>
@endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"> Create Post </h5>
                            </div>

                            <div class="card-body">
                                <div class="form-group my-3">
                                    <label for="title"> Title </label>
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" />
                                </div>


                                <div class="form-group my-3">
                                    <label for="content"> Content </label>
                                    <textarea name="content" id="content" class="form-control" placeholder="Content"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"> Save </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>