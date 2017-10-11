<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * Class DisclaimerTest
 *
 * @package Tests\Feature
 */
class DisclaimerTest extends TestCase
{
    /**
     * @test
     * @covers \ActivismeBE\Http\Controllers\DisclaimerController::index()
     */
    public function testDisclaimer()
    {
        $this->get(route('disclaimer.index'))->assertStatus(200);
    }
}
