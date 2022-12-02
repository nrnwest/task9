<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\ApiCourse;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/v1/courses/",
     *     operationId="CourseIndex",
     *     tags={"Courses"},
     *     summary="Students in Course",
     *     @OA\Parameter(
     *         name="coursId",
     *         in="query",
     *         description="courses id: 1-10",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="1",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Student in Сours"
     *     ),
     * )
     */
    public function index(ApiCourse $apiCourse, CourseService $courseService, Request $request): JsonResponse
    {
        $coursId = (int) $request->get('coursId', 1);
        return response()->json($apiCourse->getStudentsInCuorse($coursId, $courseService));
    }

}
