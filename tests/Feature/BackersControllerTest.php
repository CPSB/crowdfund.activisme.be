<?php

namespace Tests\Feature;

use ActivismeBE\Finance;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class BackersControllerTest
 *
 * @todo    Implement test for the backers delete method.
 * @package Tests\Feature
 */
class BackersControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\BackersController::index()
     */
    public function testIndexPage()
    {
        $user  = $this->createUser();
        $admin = $this->createAdmin();

        // Test unauthorized access (No authenticated user).
        $this->get(route('backers'))->assertStatus(302);

        // Test unauthorized access (Normal user in the network).
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('backers'))
            ->assertStatus(403);

        auth()->logout();

        // Test authorized access
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->get(route('backers'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\BackersController::create()
     */
    public function testBackerCreatePage()
    {
        $user  = $this->createUser();
        $admin = $this->createAdmin();

        // test unauthorized access (No authenticated user.)
        $this->get(route('backers.transaction.create'))->assertStatus(302);

        // Test unauthorized access (normalusers in the network)
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('backers.transaction.create'))
            ->assertStatus(403);

        // Test authorized access
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->get(route('backers.transaction.create'))
            ->assertStatus(200);
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\BackersController::showTransaction()
     */
    public function testShowTransactionFound()
    {
        $transaction    = factory(Finance::class)->create();
        $user           = $this->createUser();
        $admin          = $this->createAdmin();

        // Test unauthorized access (no authenticated user)
        $this->get(route('backers.transaction.show', $transaction))
            ->assertStatus(302);

        // test unauthorized user. (Normal login in the network)
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('backers.transaction.show', $transaction))
            ->assertStatus(403);

        // test authorized access
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->get(route('backers.transaction.show', $transaction))
            ->assertStatus(200);
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\BackersController::showTransaction()
     */
    public function testShowTransactionNotFound()
    {
        $user  = $this->createUser();
        $admin = $this->createAdmin();

        // Test unauthorized access (no authencated access)
        $this->get(route('backers.transaction.show', ['id' =>100]))
            ->assertStatus(302);

        // Test unauthorized user. (Normal user in the network).
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->get(route('backers.transaction.show', ['id' => 1000]))
            ->assertStatus(403);

        auth()->logout();

        // Test authorized access
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->get(route('backers.transaction.show',['id' => 1000]))
            ->assertSessionHas(['flash_notification.0.message' => 'Wij konden de transactie niet vinden in het systeem.'])
            ->assertRedirect(route('backers'));
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\BackersController::store()
     */
    public function testStoreTransactionNoValidationErrors()
    {
        $user  = $this->createUser();
        $admin = $this->createAdmin();
        $input = [
            'creator_id'        => $user->id,
            'type'              => 'bijdrage',
            'amount'            => '2.5',
            'finance_plan'      => 'Act',
            'uitvoerder'        => 'Jan',
            'titel'             => 'Bijdrage',
            'extra_informatie'  => 'bestrijding'
        ];

        // Test unauthorized access (No authenticated user.)
        $this->post(route('backers.transaction.store'), $input)
            ->assertStatus(302);

        $this->assertDatabaseMissing('finances', $input);
        auth()->logout();

        // Test unauthorized access (Default user in the network).
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('backers.transaction.store'), $input)
            ->assertStatus(403);

        $this->assertDatabaseMissing('finances', $input);
        auth()->logout();

        // Authorized access
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->post(route('backers.transaction.store'), $input)
            ->assertSessionHas(['flash_notification.0.message' => 'De transactie is opgeslagen in het systeem.'])
            ->assertStatus(302);
    }

    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\BackersController::store()
     */
    public function testStoreTransactionWithValidationErrors()
    {
        $user  = $this->createUser();
        $admin = $this->createAdmin();

        // Unatuhrozied access (No authentication user)
        $this->post(route('backers.transaction.store'), [])
            ->assertStatus(302);

        // The access with a normal user in the network.
        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->post(route('backers.transaction.store'), [])
            ->assertStatus(403);

        // The authorized access
        $this->actingAs($admin)
            ->seeIsAuthenticatedAs($admin)
            ->post(route('backers.transaction.store'), [])
            ->assertSessionMissing(['flash_notification.0.message' => 'De transactie is opgeslagen in het systeem.'])
            ->assertSessionHasErrors()
            ->assertStatus(302);
    }
}
