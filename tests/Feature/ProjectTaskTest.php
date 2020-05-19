<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTaskTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_project_can_have_tasks()
    {

        $this->signIn();
        $project = auth()->user()->projects()->create(factory(Project::class)->raw());

        $this->post($project->path() . '/task', ['body' => 'Test Task']);

        $this->get($project->path())->assertSee('Test Task');
    }
    /** @test **/
    public function a_project_requires_a_body()
    {
        $this->signIn();
        $project = auth()->user()->projects()->create(factory(Project::class)->raw());
        $attributes = factory('App\Task')->raw(['body' => '']);
        $this->post($project->path() . '/task', $attributes)->assertSessionHasErrors('body');
    }
}
