<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskInterface;
use Illuminate\Http\Request;

class TaskRepository implements TaskInterface
{
    const PER_PAGE = 5;
    public $task;
    public $user;

    public function __construct(Task $task, User $user)
    {
        $this->task = $task;
        $this->user = $user;
    }
    /**
     * Display a listing of tasks per page.
     *
     * @return \Illuminate\View\View
     */
    public function getTaskPerPage()
    {
        return $this->task->latest()->paginate(self::PER_PAGE);
    }

    /**
     * Store a newly created task in the database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeTask(Request $request)
    {
        return $this->task->create(['title' => $request->title, 'description' => $request->description]);
    }

    /**
     * Update the specified task in the database.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTask(Request $request, $id)
    {
        return $this->task->find($id)->update(['title' => $request->title, 'description' => $request->description]);
    }

    /**
     * Remove the specified task from the database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeTask($id)
    {
        return $this->task->find($id)->delete();
    }

    /**
     * Mark a task as completed or incomplete.
     *
     * @param  Task $taskStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function taskStatus(Task $taskStatus)
    {
        $task = $this->task->find($taskStatus->id);
        if ($task) {
            return $task->update(['status' => !$taskStatus->status]);
        }

        return back();

    }

    /**
     * Assign a task to a user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignToUser(Request $request)
    {
        $user = $this->user->find($request->user);
        $task = $this->task->find($request->task);

        if ($user && $task) {
            $taskAlreadyAssinged = $this->task->where(['id' => $task->id, 'user_assign_id' => $user->id]);
            //if task is already assinged to someone, remove it from that user and assign it to different user
            if ($taskAlreadyAssinged->exists()) {
                $task->update(['user_assign_id' => false]);
            }

            $task->update(['user_assign_id' => $user->id]);

            return true;
        }

        return false;
    }

}
