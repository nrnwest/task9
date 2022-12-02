<?php

namespace Database\Seeders;

use App\Models\CourseStudent;
use App\Services\RandomStudent;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CourseStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomStudent = new RandomStudent(Factory::create());
        $coursesStudents = $randomStudent->getCourseStudent(
            $randomStudent->getCoursesId(),
            $randomStudent->getStudentsId(),
            $randomStudent->getAmountCourseStudent()
        );

        foreach ($coursesStudents as $studentId => $courses) {
            foreach ($courses as $cours) {
                $courseStudent = new CourseStudent();
                $courseStudent->student_id = $studentId;
                $courseStudent->course_id = $cours;
                $courseStudent->save();
            }
        }
    }
}
