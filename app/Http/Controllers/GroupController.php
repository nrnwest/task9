<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GroupController extends Controller
{

    public function index(CourseService $courseService, Request $request): View
    {
        $amountStudents = (int) $request->get('amountStudents', CourseService::AMOUNT_STUDENTS_DEFAULT);
        $groups = $courseService->getNumberStudentsGroup($amountStudents);
        return view(
            'groups.index',
            [
                'studentInGroup' => $courseService->availableNumberStudentsInGroup(),
                'groups' => $groups,
                'amountStudent' => $amountStudents,
            ]
        );
    }
}
