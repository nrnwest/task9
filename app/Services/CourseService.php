<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class CourseService
{
    public const AMOUNT_STUDENTS_DEFAULT = 10;

    public function getNumberStudentsGroup(int $amount): Collection
    {
        $groupsId = Student::query()
            ->selectRaw
            (
                'students.group_id,
                count(students.group_id) as amount_students_in_group,
                groups.name as group_name'
            )
            ->join('groups', 'students.group_id', '=', 'groups.id')
            ->groupBy('students.group_id', 'groups.name')
            ->havingRaw('count(students.group_id)<= ?', [$amount])
            ->get();
        return $groupsId;
    }

    public function getStudentsInCourse(int $idCourse): Collection
    {
        $course = Course::find($idCourse);
        $result = $course->students;

        return $result;
    }

    public function updateStudent(array $data, Student $student): void
    {
        $courses = $data['courses'];
        unset($data['courses']);
        $student->update($data);
        $student->courses()->sync($courses);
    }

    public function deleteStudent(Student $student): void
    {
        $student->courses()->detach();
        $student->delete();
    }

    public function getCourses(): Collection
    {
        return Course::all();
    }

    public function getGroups(): Collection
    {
        return Group::all();
    }

    public function getStudens(array $sortBy = ['id', 'group_id']): Collection
    {
        return Student::all()->sortBy($sortBy);
    }

    public function availableNumberStudentsInGroup(): array
    {
        return range(1, 30);
    }

    public function createStudent(array $data): void
    {
        $student = Student::firstOrCreate(
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name']
            ],
            [
                'group_id' => $data['group_id']
            ]
        );

        foreach ($data['courses'] as $coursID) {
            CourseStudent::firstOrCreate(
                [
                    'student_id' => $student->id,
                    'course_id' => $coursID
                ]
            );
        }
    }
}
