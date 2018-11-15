<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GameTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExistingRoutePageTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function testNonExistingRouteTest()
    {
        $response = $this->get('/test');
        $response->assertStatus(404);
    }

    public function testSameNamePlayersTest()
    {
        $response = $this->json('POST', '/play',
        	['player1' => 'Onur', 'player2' => 'Onur']);
        $response->assertStatus(302);
    } 

    public function testDiffrentNamePlayersTest()
    {
        $response = $this->json('POST', '/play',
        	['player1' => 'Onur', 'player2' => 'Ugur']);
        $response->assertStatus(200);
    }

    public function testRollValuesTest()
    {
        $response = $this->get('/roll');
        $responseBody = $response->json();

        self::assertTrue(isset($responseBody[0]));
        self::assertTrue(isset($responseBody[1]));
        self::assertTrue(($responseBody[0] <= 6));
        self::assertTrue(($responseBody[1] <= 6));
        self::assertFalse(($responseBody[0] <= 0));
        self::assertFalse(($responseBody[1] <= 0));
    }
}
