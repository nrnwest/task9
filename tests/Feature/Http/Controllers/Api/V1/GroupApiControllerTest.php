<?php

namespace Http\Controllers\Api\V1;

use Tests\TestCase;

class GroupApiControllerTest extends TestCase
{

    public function testIndex(): void
    {
        $response = $this->get('/api/v1/groups/');
        $response->assertStatus(200);
    }

}
