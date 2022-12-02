<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(CourseService $courseService, Request $request): View
    {
        $coursId = (int)$request->get('coursId', 1);
        return view(
            'courses.index',
            [
                'coursId' => $coursId,
                'courses' => $courseService->getCourses(),
                'students' => $courseService->getStudentsInCourse($coursId)
            ]

        );
    }
}
