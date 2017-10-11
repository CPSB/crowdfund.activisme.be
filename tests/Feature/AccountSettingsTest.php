<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class AccountSettingsTest
 *
 * @package Tests\Feature
 */
class AccountSettingsTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\AccountSettingsController::index()
     */
    public function testSettingsPageIndex()
    {
        $user = $this->createUser();

        // Test access when no authenticated user.
        $this->get(route('settings.index'))->assertStatus(302);

        $this->actingAs($user) // Test authencation as user.
            ->seeIsAuthenticatedAs($user)
            ->get(route('settings.index'));
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\AccountSettingsController::updateInfo()
     */
    public function testAccountInfoUpdate()
    {
        $user    = $this->createUser();
        // $blocked = $this->createBlockedUser();
        $input   = ['name' => 'jhon doe', 'email' => 'name@domain.tld'];

        // Test unauthorized access (no authenticated user)
        $this->post(route('settings.info'), $input)
            ->assertStatus(302)
            ->assertSessionMissing(['flash_notification.0.message' => trans('profile-settings.flash-info')]);

        // Test unauthorized access (Blocked user)
        // $this->actingAs($blocked)
        //    ->seeIsAuthenticatedAs($blocked)
        //    ->post(route('settings.info'), $input)
        //    ->assertStatus(302);

        // $this->assertDatabaseMissing('users', $input);
        // auth()->logout();

        // Test User access but form has validation errors
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.info'), [])
            ->assertStatus(302)
            ->assertSessionHasErrors()
            ->assertSessionMissing(['flash_notification.0.message' => trans('profile-settings.flash-info')]);

        $this->assertDatabaseMissing('users', $input);
        auth()->logout();

        // Test user info update (no errors and the correct permissions. )
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.info'), $input)
            ->assertStatus(302);

        $this->assertDatabaseHas('users', $input);
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\AccountSettingsController::updateSecurity()
     */
    public function testAccountSecurityUpdate()
    {
        $user    = $this->createUser();
        // $blocked = $this->createBlockedUser();
        $input   = ['password' => 'Pw123456', 'password_confirmation' => 'pw123456'];

        // Test unauthorized access (no authenticated user)
        $this->post(route('settings.security'), $input)
            ->assertStatus(302)
            ->assertSessionMissing(['flash_notification.0.message' => trans('profile-settings.flash-password')]);

        // Test unauthorized access (Blocked user)
        // $this->actingAs($blocked)
        //    ->seeIsAuthenticatedAs($blocked)
        //    ->post(route('settings.security'), $input)
        //    ->assertStatus(302);

        // $this->assertDatabaseMissing('users', $input);
        // auth()->logout();

        // Test User access but form has validation errors
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.security'), [])
            ->assertStatus(302)
            ->assertSessionHasErrors()
            ->assertSessionMissing(['flash_notification.0.message' => trans('profile-settings.flash-password')]);

        // $this->assertDatabaseMissing('users', $input);
        auth()->logout();

        // Test user info update (no errors and the correct permissions. )
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('settings.security'), $input)
            ->assertStatus(302);

        // $this->assertDatabaseHas('users', $input);
    }
}
