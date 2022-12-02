<?php

namespace Tests\Unit;

use App\Models\Group;
use App\Repositories\GroupRepository;
use App\Services\GroupService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroupUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The group service variable.
     *
     * @var GroupService
     */
    private GroupService $groupService;

    public function setUp(): void
    {
        parent::setUp();
        $this->groupService = new GroupService(new GroupRepository());
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_group()
    {
        Group::factory()->create();
        $response = $this->groupService->index();

        $this->assertArrayHasKey('status', $response);
        $this->assertArrayHasKey('message', $response);
        $this->assertArrayHasKey('paginated_entities', $response);
    }
}
