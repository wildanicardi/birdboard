<?php

namespace App;

use App\Project;
use App\Activity;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use RecordsActivity;
    /**
     * Attributes to guard against mass assignment.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * Model events that should trigger new activity.
     *
     * @var array
     */
    protected static $recordableEvents = ['created', 'deleted'];

    /**
     * The relationships that should be touched on save.
     *
     * @var array
     */
    protected $touches = ['project'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['completed' => 'boolean'];
    /**
     * the task as complete.
     */
    public function complete()
    {
        $this->update(['completed' => true]);
        $this->recordActivity('completed_task');
    }
    /**
     * the task as incomplete.
     */
    public function incomplete()
    {
        $this->update(['completed' => false]);
        $this->recordActivity('uncompleted_task');
    }
    /**
     * Get the owning project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    /**
     * Get the path to the task.
     *
     * @return string
     */
    public function path()
    {
        return "/projects/{$this->project->id}/tasks/{$this->id}";
    }
}
