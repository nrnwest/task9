<?php

namespace Database\Seeders;

use App\DTO\CourseDTO;
use App\Models\Course;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $courses = new CourseDTO();
        foreach ($courses->getCourses() as $course) {
            $coursModel = new Course();
            $coursModel->name = $course;
            $coursModel->description = $faker->text(250);
            $coursModel->save();
        }
    }
}
