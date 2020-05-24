<?php

namespace Tests\Unit;

use App\User;
use Facades\Tests\Setup\ProjectFactory;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection as IlluminateCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_has_projects()
    {
        $user = factory('App\User')->create();
        $this->assertInstanceOf(IlluminateCollection::class, $user->projects);
    }
    /** @test **/
    public function a_user_has_accessible_projects()
    {
        $wildan = $this->signIn();
        ProjectFactory::ownedBy($wildan)->create();

        $this->assertCount(1, $wildan->accessibleProjects());

        $sally = factory(User::class)->create();
        $nick = factory(User::class)->create();
        $project = tap(ProjectFactory::ownedBy($sally)->create())->invite($nick);

        $this->assertCount(1, $wildan->accessibleProjects());
        $project->invite($wildan);
        $this->assertCount(2, $wildan->accessibleProjects());
    }
}
