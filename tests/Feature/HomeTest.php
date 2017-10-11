<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class HomeTest
 *
 * @package Tests\Feature
 */
class HomeTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\HomeController::index()
     */
    public function testHomeView()
    {
        $this->get(route('index'))->assertStatus(200);
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\HomeController::backend()
     */
    public function testHomeBackendView()
    {
        // TODO:  Extends to some test with all the possible users.

        $user       = $this->createUser();
        $blocked    = $this->createBlockedUser();
        $admin      = $this->createAdmin();

        // Test access when unauthenticated
        $this->get(route('home'))->assertRedirect('/');

        // Test access when user is a normal user.
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('home'))
            ->assertStatus(403);

        auth()->logout();

        // test when the user is blocked.
        $this->actingAs($blocked)
            ->seeIsAuthenticatedAs($blocked)
            ->get(route('home'))
            ->assertStatus(403);

        auth()->logout();

        // Test access when user is admin.
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->get(route('home'))
            ->assertStatus(200);
    }
}
