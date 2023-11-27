<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $task->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <a href="{{ route('tasks.index') }}">
                    <button type="button"
                        class="rounded bg-indigo-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Back to task
                    </button>
                </a>
                <form action="{{ route('tasks.delete', [$task->id]) }}" method="post" class="ml-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="rounded bg-red-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Delete
                    </button>
                </form>
            </div>


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-3">
                <div class="p-6 text-gray-900">
                    {!! $task->description !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>