<?php

declare(strict_types=1);

namespace Http\Controllers\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroupApiControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $seed = true;

    public function testIndex(): void
    {
        $response = $this->get('/api/v1/groups/');
        $response->assertStatus(200);
    }

    public function testDeleteStudent(): void
    {
        $response = $this->delete('/students/20');
        $response->assertRedirect();
    }

}
