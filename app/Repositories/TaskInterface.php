<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Http\Request;

interface TaskInterface
{
    /**
     * Display a listing of tasks.
     *
     * @return \Illuminate\View\View
     */
    public function getTaskPerPage();

    /**
     * Store a newly created task in the database.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeTask(Request $request);

    /**
     * Update the specified task in the database.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTask(Request $request, $id);

    /**
     * Remove the specified task from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeTask($id);

    /**
     * Mark a task as completed or incomplete.
     *
     * @param  Task $taskStatus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function taskStatus(Task $taskStatus);

    /**
     * Assign a task to a user.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function assignToUser(Request $request);
}
