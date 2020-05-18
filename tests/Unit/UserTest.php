<?php

namespace Tests\Unit;

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
}
