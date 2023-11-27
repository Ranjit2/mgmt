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
            <a href="{{route('tasks.index')}}">
                <button type="button"
                    class="rounded bg-indigo-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Back to task
                </button>
            </a>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">

                <div class="p-6 text-gray-900">
                    <form method="post" action="{{route('user.assign')}}">@csrf
                        <div class="px-4 sm:px-6 lg:px-8">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                                task</label>
                            <select id="" name="task"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Choose a task</option>
                                @foreach ($tasks as $task )
                                <option value="{{$task->id}}">{{$task->title}}</option>

                                @endforeach

                            </select>

                        </div>

                        <div class="px-4 sm:px-6 lg:px-8">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                user</label>
                            <select name="user"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Assign to user</option>
                                @foreach ($users as $user )
                                <option value="{{$user->id}}">{{$user->name}}({{$user->email}})</option>

                                @endforeach

                            </select>

                        </div>
                        <button type="submit"
                            class="mt-5 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                            Task</button>
                </div>
                </form </div>
            </div>
        </div>


</x-app-layout>
