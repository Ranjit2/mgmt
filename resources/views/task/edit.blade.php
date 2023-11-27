<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('tasks.index')}}" class="text-indigo-500 mb-3">Back to Task</a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{route('tasks.update',[$task->id])}}" method="POST">@csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                            <input type="text" id="title" name="title" value="{{$task->title}}"
                                class="border-gray-300 mt-1 p-2 w-full border rounded-md">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                            <textarea id="content" name="description" rows="4"
                                class="border-gray-300 mt-1 p-2 w-full border rounded-md shadow-sm">
                                {{$task->description}}
                            </textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <x-primary-button class="ms-3">
                            {{ __('Update Task') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
    </script>
</x-app-layout>