<?php

namespace App\Http\Controllers;

use App\Services\TestService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke(TestService $testService)
    {
        return response($testService->getYear());
    }
}
