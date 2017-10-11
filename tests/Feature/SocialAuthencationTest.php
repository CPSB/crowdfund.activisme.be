<?php

namespace Tests\Feature;

use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class SocialAuthencationTest
 *
 * @package Tests\Feature
 */
class SocialAuthencationTest extends TestCase
{
    /**
     * @test
     *
     * @covers \ActivismeBE\Http\Controllers\Auth\SocialAuthencation::redirectToProvider()
     * @covers \ActivismeBE\Http\Controllers\Auth\SocialAuthencation::handleProviderCallback()
     */
    public function testFacebookAuthencation()
    {
        Socialite::shouldReceive('driver->fields->scopes->user')->with('facebook')->andReturn(true);
        $this->get(route('social', ['callback' => 'facebook']));
    }

    /**
     * @test
     *
     * @covers \ActivismeBE\Http\Controllers\Auth\SocialAuthencation::redirectToProvider()
     * @covers \ActivismeBE\Http\Controllers\Auth\SocialAuthencation::handleProviderCallback()
     */
    public function testTwitterAuthencation()
    {
        Socialite::shouldReceive('driver->fields->scopes->user')->with('twitter')->andReturn(true);
        $this->get(route('social', ['callback' => 'twitter']));
    }
}
