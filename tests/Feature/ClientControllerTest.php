<?php

namespace Tests\Feature;

use App\Models\Manager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Test unauthenticated client.
     *
     * @return void
     */
    public function test_unauthenticated_client()
    {
        $response = $this->get(route('clients.index'));

        $response->assertStatus(401);
        $response->assertJson([
            'message' => 'Unauthenticated',
        ]);
    }

    /**
     * Test authenticated client.
     *
     * @return void
     */
    public function test_authenticated_client()
    {
        $manager = Manager::factory()->create([
            'level' => '2'
        ]);

        $token = $this->post(route('login'),[
                'code' => $manager->code,
                'password' => 'password'
            ]);
            
        $token = data_get($token, 'token');
        
        $response = $this->get(route('clients.index'),[
            'X-API-Key' => $token
        ]);

        $response->assertStatus(200);
    }

    /**
     * Test unauthenticated client by level.
     *
     * @return void
     */
    public function test_unauthenticated_client_by_level()
    {
        $manager = Manager::factory()->create([
            'level' => '1'
        ]);

        $token = $this->post(route('login'),[
                'code' => $manager->code,
                'password' => 'password'
            ]);
            
        $token = data_get($token, 'token');
        
        $response = $this->get(route('clients.index'),[
            'X-API-Key' => $token
        ]);

        $response->assertStatus(401);
    }
}
