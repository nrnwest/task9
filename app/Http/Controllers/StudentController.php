<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Services\CourseService;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index(CourseService $courseService): View
    {
        $students = $courseService->getStudens();
        $groups = $courseService->getGroups();

        return view(
            'students.index',
            compact('students', 'groups')
        );
    }

    public function create(CourseService $courseService): View
    {
        return view(
            'students.create',
            [
                'groups' => $courseService->getGroups(),
                'courses' => $courseService->getCourses()
            ]
        );
    }

    public function store(StoreStudentRequest $request, CourseService $courseService): \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $courseService->createStudent($data);

        return redirect()->route('students.index');
    }

    public function show(Student $student): View
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student, CourseService $courseService): View
    {
        $groups = $courseService->getGroups();
        $courses = $courseService->getCourses();

        return view('students.edit', compact('student', 'groups', 'courses'));
    }

    public function update(UpdateStudentRequest $request, Student $student, CourseService $courseService): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $courseService->updateStudent($data, $student);

        return redirect()->route('students.show', compact('student'));
    }

    public function destroy(Student $student, CourseService $courseService): \Illuminate\Http\RedirectResponse
    {
        $courseService->deleteStudent($student);

        return redirect()->route('students.index');
    }
}
