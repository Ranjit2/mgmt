<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;
    private $user;
    private $task;

    public function __construct(TaskRepository $taskRepository, User $user, Task $task)
    {
        $this->taskRepository = $taskRepository;
        $this->task = $task;
        $this->user = $user;
    }

    /**
     * Retrieve and display a paginated list of tasks.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = $this->taskRepository->getTaskPerPage();

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
        $this->validateTask($request);
        $this->taskRepository->storeTask($request);

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
    public function update(Request $request, int $id)
    {
        $this->validateTask($request);
        $this->taskRepository->updateTask($request, $id);

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
    public function destroy(Request $request, int $id)
    {
        $this->taskRepository->removeTask($id);
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
        $this->taskRepository->taskStatus($taskStatus);
        return redirect()->route('tasks.index')->with('message', $taskStatus->status == 1 ? 'Task marked as completed' : 'Task marked as incomplete');
    }

    /**
     * Display the view for assigning tasks to users.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Contracts\View\View
     */
    public function assign(Task $task)
    {
        $users = $this->user->all();
        $tasks = $this->task->where('status', false)->get();

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
        $assing = $this->taskRepository->assignToUser($request);
        $task = $this->task->find($request->task);
        $user = $this->user->find($request->user);
        if ($assing) {
            return redirect()->route('tasks.assign')->with('message', $task->title . 'has been assigned to:' . $user->name);
        }
        return back()->with('message', 'Error while assigning');
    }

    public function validateTask($request)
    {
        return $this->validate($request, ['title' => 'required|min:5|max:100', 'description' => 'required|min:20|max:5000']);
    }
}
