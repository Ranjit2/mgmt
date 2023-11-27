<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('tasks.index')}}"><button type="button"
                    class="rounded bg-indigo-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Back
                    to task</button>
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900">
                    <form action="{{route('tasks.store')}}" method="POST">@csrf
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-600">Title</label>
                            <input type="text" id="title" name="title"
                                class="border-gray-300 mt-1 p-2 w-full border rounded-md">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                            <textarea id="content" name="description" rows="4"
                                class="border-gray-300 mt-1 p-2 w-full border rounded-md shadow-sm"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <button type="submit"
                            class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                            Task</button>
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