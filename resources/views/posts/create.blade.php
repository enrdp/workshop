<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="relative mb-5">
               <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Title</label>
               <input type="text" name="title" class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" placeholder="Title">
               @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>

            <div class="relative mb-5">
               <label class="absolute px-2 ml-2 -mt-3 font-medium text-gray-600 bg-white">Content</label>
               <textarea type="text" name="content" class="block w-full px-4 py-4 mt-2 text-base placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-black" placeholder="Content">
               </textarea>
               @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
            </div>

<div class="flex">
  <div class="mb-3 w-96">
    <label for="formFileSm" class="form-label inline-block mb-2 text-gray-700">Upload photo</label>
    <input accept="image/*" name="file" required class="form-control
    block
    w-full
    px-2
    py-1
    text-sm
    font-normal
    text-gray-700
    bg-white bg-clip-padding
    border border-solid border-gray-300
    rounded
    transition
    ease-in-out
    m-0
    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="formFileSm" type="file">
   
    <img id="img_preview" src="#" alt="" />
</div>
</div>
           
                                <div class="form-group mt-5">
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
      ease-in-out"> Save </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    formFileSm.onchange = evt => {
  const [file] = formFileSm.files
  if (file) {
    img_preview.src = URL.createObjectURL(file)
    img_preview.alt = file.name.split('.')[0]
  }
}
</script>