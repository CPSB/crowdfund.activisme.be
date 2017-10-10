<?php

namespace Tests\Feature;

use ActivismeBE\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function testHomeView()
    {
        $this->get(route('index'))->assertStatus(200);
    }

    public function testHomeBackendView()
    {
        // TODO:  Extends to some test with all the possible users.

        $user = $this->createAdmin();

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('home'))
            ->assertStatus(200);
    }
}
