<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function store(Project $project)
    {
        $this->authorize('update', $project);

        request()->validate(['body' => 'required']);
        $project->addTask(request('body'));

        return redirect($project->path());
    }
    public function update(Project $project, Task $task)
    {
        $this->authorize('update', $task->project);
        $task->update([
            'body' => request('body'),
            'completed' => request()->has('completed'),
        ]);
        return redirect($project->path());
    }
}
