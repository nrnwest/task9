<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\ApiCourse;
use App\Services\CourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GroupApiController extends Controller
{

    /**
     * @OA\Get(
     *     path="/v1/groups/",
     *     operationId="GroupsIndex",
     *     tags={"Courses"},
     *     summary="Students in groups",
     *     @OA\Parameter(
     *         name="amountStudents",
     *         in="query",
     *         description="The number of students is less than or equal to a given number: amountStudents: 10...30",
     *         required=true,
     *         @OA\Schema(
     *             type="string",
     *             default="30",
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Student in groups description"
     *     ),
     * )
     */
    public function index(ApiCourse $apiCourse, Request $request, CourseService $courseService): JsonResponse
    {
        $amountStudents = $request->get('amountStudents', CourseService::AMOUNT_STUDENTS_DEFAULT);
        return response()->json($apiCourse->getGroups($amountStudents, $courseService));
    }

}
