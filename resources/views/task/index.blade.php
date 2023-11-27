<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::get('message'))
            <div class="rounded-md bg-green-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">Task notification</h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>{{Session::get('message')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                <div class="p-6 text-gray-900">

                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-gray-900">Tasks</h1>
                                <p class="mt-2 text-sm text-gray-700">A list tasks
                                </p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                                <a href="{{ route('tasks.create') }}">
                                    <button type="button"
                                        class="inline-block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                                        Task
                                    </button>
                                </a>

                                <a href="{{ route('tasks.assign') }}">
                                    <button type="button"
                                        class="inline-block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign
                                        Task
                                    </button>
                                </a>
                            </div>

                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                    Mark </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                    Assign To </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                                    Title</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Created Date</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Action</th>
                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            @forelse ($tasks as $task)
                                            <tr class="{{ $task->status ==1 ? 'bg-gray-100': '' }}">
                                                <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                                    <div class="flex items-center">
                                                        <div class="h-11 w-11 flex-shrink-0 flex">
                                                            <input type="checkbox" disabled="" id="status"
                                                                {{ $task->status == 1? 'checked':'' }}
                                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    <div class="text-gray-900">{{$task->user?$task->user->name: 'N/A'}}</div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    <div class="text-gray-900">{{ $task->title }}</div>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">

                                                    <span
                                                        class="inline-flex items-center rounded-md {{ $task->status == 0 ? 'bg-indigo-50':'bg-green-50'}} px-2 py-1 text-xs font-medium {{ $task->status == 0 ?'text-indigo-700':'text-green-700' }} ring-1 ring-inset {{ $task->status == 0 ? 'bg-indigo-50' : 'ring-green-600/20'}}">{{ $task->status == 0 ? 'Open' : 'Completed'
														}}</span>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                    {{ $task->created_at->format('Y-m-d') }}
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <a href="{{route('tasks.edit',[$task->id])}}"
                                                        class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                            class="sr-only"></span></a>
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <form method="post" action="{{route('tasks.status',[$task->id])}}">
                                                        @csrf
                                                        <button type="submit"
                                                            href="{{route('tasks.status',[$task->id])}}"
                                                            class="text-green-600 hover:text-indigo-900">{{ $task->status == 0 ? 'Close Task': 'Re-Open Task'}}<span
                                                                class="sr-only"></span></button>
                                                    </form>
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <a href="{{route('tasks.show',[$task->id])}}"
                                                        class="text-purple-600 hover:text-indigo-900">View<span
                                                            class="sr-only"></span></a>
                                                </td>
                                                <td
                                                    class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <a href="#" onclick="openModal()"
                                                        class="text-red-600 hover:text-indigo-900">Delete<span
                                                            class="sr-only"></span></a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div id="deleteModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
                                                <div
                                                    class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                                    </div>


                                                    <div
                                                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                                                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                            <div class="sm:flex sm:items-start">

                                                                <span onclick="closeModal()"
                                                                    class="absolute top-0 right-0 pt-2 pr-4 cursor-pointer">
                                                                    <svg class="h-6 w-6 text-gray-500"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                                    </svg>
                                                                </span>

                                                                <div
                                                                    class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                                    <h3
                                                                        class="text-lg leading-6 font-medium text-gray-900">
                                                                        Confirm Deletion
                                                                    </h3>
                                                                    <div class="mt-2">
                                                                        <p class="text-sm text-gray-500">
                                                                            Are you sure you want to delete this task?
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Delete button -->
                                                        <div
                                                            class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                            <form action="{{route('tasks.delete',[$task->id])}}"
                                                                method="post">@csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="taskId"
                                                                    value="{{$task->id}}">
                                                                <button type="submit"
                                                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring focus:border-red-300 sm:ml-3 sm:w-auto sm:text-sm">
                                                                    Delete
                                                                </button>

                                                            </form>
                                                            <button onclick="closeModal()" type="button"
                                                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring focus:border-blue-300 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            No task available to show
                                            @endforelse

                                        </tbody>

                                    </table>
                                    {{ $tasks->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function openModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
    </script>
</x-app-layout>