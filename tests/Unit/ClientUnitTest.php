<?php

namespace Tests\Unit;

use App\Models\Manager;
use App\Repositories\ClientRepository;
use App\Services\ClientService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClientUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The client service variable.
     *
     * @var ClientService
     */
    private ClientService $clientService;

    public function setUp(): void
    {
        parent::setUp();
        $this->clientService = new ClientService(new ClientRepository());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_client()
    {
        Manager::factory()->create();
        $response = $this->clientService->index();

        $this->assertArrayHasKey('status', $response);
        $this->assertArrayHasKey('message', $response);
        $this->assertArrayHasKey('paginated_entities', $response);
    }

}
