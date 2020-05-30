<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTaskController extends Controller
{
    /**
     * Add a task to the given project.
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);
        $project->addTask(request('body'));

        return redirect($project->path());
    }
     /**
     * Update the project.
     *
     * @param  Project $project
     * @param  Task    $task
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);
        $task->update(request()->validate(['body' => 'required']));
        $method = request('completed') ? 'complete' : 'incomplete';
        $task->$method();
        return redirect($project->path());
    }
}
