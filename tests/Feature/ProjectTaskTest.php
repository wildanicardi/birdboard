<?php

namespace Tests\Feature;

use App\Project;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facades\Tests\Setup\ProjectFactory;

class ProjectTaskTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function guests_cannot_add_tasks_to_project()
    {
        $project = factory('App\Project')->create();
        $this->post($project->path() . '/tasks')->assertRedirect('login');
    }
    /** @test **/
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();
        $project = factory('App\Project')->create();
        $this->post($project->path() . '/tasks', ['body' => 'Test Task'])->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'Test Task']);
    }
    /** @test **/
    public function only_the_owner_of_a_project_may_update_task()
    {
        $this->signIn();

        $project = ProjectFactory::withTasks(1)
            ->create();

        $this->patch($project->tasks[0]->path(), ['body' => 'changed'])
            ->assertStatus(403);

        $this->assertDatabaseMissing('tasks', ['body' => 'changed']);
    }
    /** @test **/
    public function a_project_can_have_tasks()
    {

        $project = ProjectFactory::create();

        $this->actingAs($project->owner)->post($project->path() . '/tasks', ['body' => 'Test Task']);

        $this->get($project->path())->assertSee('Test Task');
    }
    /** @test **/
    public function a_task_can_be_updated()
    {
        $project = ProjectFactory::withTasks(1)
            ->create();

        $this->actingAs($project->owner)->patch($project->tasks[0]->path(), [
            'body' => 'changed',
            'completed' => true
        ]);
        $this->assertDatabaseHas('tasks', [
            'body' => 'changed',
            'completed' => true
        ]);
    }

    /** @test **/
    public function a_project_requires_a_body()
    {
        $project = ProjectFactory::create();
        $attributes = factory('App\Task')->raw(['body' => '']);
        $this->actingAs(
            $project->owner
        )->post($project->path() . '/tasks', $attributes)
            ->assertSessionHasErrors('body');
    }
}
