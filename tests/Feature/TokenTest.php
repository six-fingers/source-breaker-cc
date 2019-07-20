<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TokenTest extends TestCase
{
    /**
     * Get Token.
     *
     * @return void
     */
    public function testGetToken()
    {   
        $response = $this->get('/api/token?password=aaaaaaaa');
        $response->assertStatus(422);

        $response = $this->get('/api/token?email=sal@sal.com');
        $response->assertStatus(422);

        $response = $this->get('/api/token?email=sal@sal.com&password=aaaaaaaa');
        $response->assertStatus(200);
    }
}
