<?php

namespace App;

use App\Project;
use App\Activity;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $touches = ['project'];
    protected $casts = ['completed' => 'boolean'];

    public function complete()
    {
        $this->update(['completed' => true]);
        $this->recordActivity('completed_task');
    }
    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->recordActivity('uncompleted_task');
    }
    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }
    public function recordActivity($description)
    {
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description
        ]);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }
}
