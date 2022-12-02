<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;

class ApiCourse
{

    public function getGroups(int $amountStudents, CourseService $courseService): Collection
    {
        $result = new Collection();
        $result->put('groups', $courseService->getNumberStudentsGroup($amountStudents));
        $result->put('amountStudent', $amountStudents);

        return $result;
    }

    public function getStudentsInCuorse(int $coursId, CourseService $courseService): Collection
    {
        $result = new Collection();
        $result->put('courseId',  $coursId);
        $result->put('courses', $courseService->getCourses());
        $result->put('students', $courseService->getStudentsInCourse($coursId));

        return $result;
    }

}
