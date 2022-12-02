<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Services\CourseService;
use Illuminate\Http\Request;

class StudentApiController extends Controller
{
    /**
     * @OA\Get(
     *     path="/v1/students/",
     *     operationId="StudentIndex",
     *     tags={"Courses"},
     *     summary="Students",
     *     @OA\Response(
     *         response="200",
     *         description="Students"
     *     ),
     * )
     */
    public function index(CourseService $courseService)
    {
        return response()->json($courseService->getStudens());
    }


    /**
     * @OA\Get(
     *     path="/v1/students/{student}",
     *     operationId="StudentShow",
     *     tags={"Courses"},
     *     summary="Students",
     *     @OA\Parameter(
     *          name="student",
     *          description="id student 1-200",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *         response="200",
     *         description="Students"
     *     ),
     *     @OA\Response(
     *          response=404,
     *          description="no such student"
     *      ),
     * )
     */
    public function show(Student $student)
    {
        return response()->json($student);
    }

}
