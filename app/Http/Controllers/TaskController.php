<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    const PER_PAGE = 5;

    /**
     * Retrieve and display a paginated list of tasks.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(self::PER_PAGE);

        return view('task.index', compact('tasks'));
    }

    /**
     * Display the form for creating a new task.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Request $request)
    {
        return view('task.create');
    }

    /**
     * Store a newly created task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title' => 'required|min:5|max:100', 'description' => 'required|min:20|max:5000']);

        Task::create(['title' => $request->title, 'description' => $request->description]);

        return redirect()->route('tasks.index')->with('message', 'Task created successfully');
    }

    /**
     * Display the form for editing an existing task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update an existing task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['title' => 'required|min:5|max:100', 'description' => 'required|min:20|max:5000']);

        Task::find($id)->update(['title' => $request->title, 'description' => $request->description]);

        return redirect()->route('tasks.index')->with('message', 'Task update successfully');
    }

    /**
     * Display detailed information about a specific task.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    /**
     * Delete a task from the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Task::find($request->id)->delete();

        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully');
    }

    /**
     * Toggle the status (completed or incomplete) of a task.
     *
     * @param  \App\Models\Task  $taskStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Task $taskStatus)
    {
        $task = Task::find($taskStatus->id);
        $task->update(['status' => !$taskStatus->status]);

        return redirect()->route('tasks.index')->with('message', $task->status == 1 ? 'Task marked as completed' : 'Task marked as incomplete');
    }

    /**
     * Display the view for assigning tasks to users.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View
     */
    public function assign(Task $task)
    {
        $users = User::all();
        $tasks = Task::where('status', false)->get();

        return view('task.assign', compact('tasks', 'users'));
    }

    /**
     * Assign a task to a specific user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignToUser(Request $request)
    {
        $user = User::find($request->user);
        $task = Task::find($request->task);

        if ($user && $task) {
            $taskAlreadyAssinged = Task::where(['id' => $task->id, 'user_assign_id' => $user->id]);
            //if task is already assinged to someone, remove it from that user and assign it to different user
            if ($taskAlreadyAssinged->exists()) {
                $task->update(['user_assign_id' => false]);
            }

            $task->update(['user_assign_id' => $user->id]);
            return redirect()->route('tasks.assign')->with('message', $task->title . 'has been assigned to:' . $user->name);
        }

        return back()->with('message', 'Error while assigning');
    }
}
