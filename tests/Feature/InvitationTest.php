<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvitationTest extends TestCase
{
    use RefreshDatabase;
    /** @test **/
    public function a_project_can_invite_a_user()
    {
        $project = ProjectFactory::create();
        $project->invite($newUser = factory(User::class)->create());

        $this->signIn($newUser);
        $this->post(action('ProjectTaskController@store', $project), $task = ['body' => 'foo task']);
        $this->assertDatabaseHas('tasks', $task);
    }
}
