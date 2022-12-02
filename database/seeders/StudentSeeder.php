<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Services\RandomStudent;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $randomStudent = new RandomStudent(Factory::create());
        $studentsInGroups = $randomStudent->getGroupStudents(
            $randomStudent->getGroupsId(),
            $randomStudent->getStudentsId(),
            $randomStudent->getAmountStudentGroup(),
        );
        // write student last and first name
        foreach ($randomStudent->getFullName() as $studetnName) {
            $studentModel = new Student();
            $studentModel->first_name = $studetnName->getFirstName();
            $studentModel->last_name = $studetnName->getLastName();
            $studentModel->save();
        }
        foreach (Student::all() as $student) {
            $student->group_id = $studentsInGroups[$student->id];
            $student->save();
        }
    }
}
