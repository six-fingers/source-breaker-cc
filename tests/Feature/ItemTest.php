<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{

    protected $token;
    protected $first_id;

    protected function setUp(): void
    {
        parent::setUp();

        $response = $this->get('/api/token?email=sal@sal.com&password=aaaaaaaa');
        $this->token= json_decode($response->getContent())->api_token;

        $response = $this->get('/api/items?api_token='.$this->token);
        $this->first_id = json_decode($response->getContent())[0]->id;
    }
    
    /**
     * Create An Item.
     *
     * @return void
     */
    public function testCreateAnItem()
    {
        $response = $this->post('/api/item?api_token='.$this->token);
        $response->assertStatus(422);

        $response = $this->post('/api/item?api_token='.$this->token.'&name=Buy Milk');
        $response->assertStatus(200);
    }
    
    /**
     * Delete An Item.
     *
     * @return void
     */
    public function testDeleteAnItem()
    {   
        $response = $this->delete('/api/item?api_token='.$this->token);
        $response->assertStatus(422);

        $response = $this->delete('/api/item?api_token='.$this->token.'&id='.$this->first_id);
        $response->assertStatus(200);
    }

    /**
     * Mark item as done.
     *
     * @return void
     */
    public function testMarkItemAsDone()
    {   
        $response = $this->put('/api/item?api_token='.$this->token);
        $response->assertStatus(422);

        $response = $this->put('/api/item?api_token='.$this->token.'&id='.$this->first_id);
        $response->assertStatus(200);
    }

    /**
     * Get List Of Items.
     *
     * @return void
     */
    public function testGetListOfItems()
    {
        $response = $this->get('/api/items?api_token='.$this->token);
        $response->assertStatus(200);

    }
}
