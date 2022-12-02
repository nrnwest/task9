<?php

namespace Tests\Unit;

use App\Services\RandomStudent;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class RandomFullNameTest extends TestCase
{
    protected RandomStudent $randomStudent;

    protected function setUp(): void
    {
        $this->randomStudent = new RandomStudent(Factory::create());
    }

    public function testRandomFullName(): void
    {
        $result = $this->randomStudent->getFullName();
        $this->assertCount(RandomStudent::AMOUNT_STUDENT, $result);
    }

    public function testGetGroopStudent()
    {
        $result = $this->randomStudent->getGroupStudents(
            $this->randomStudent->getGroupsId(),
            $this->randomStudent->getStudentsId(),
            $this->randomStudent->getAmountStudentGroup(),
        );

        $this->assertCount(RandomStudent::AMOUNT_STUDENT, $result);
    }

    public function testGetCourseStudent()
    {
        $result = $this->randomStudent->getCourseStudent(
            $this->randomStudent->getCoursesId(),
            $this->randomStudent->getStudentsId(),
            $this->randomStudent->getAmountCourseStudent(),
        );

        $this->assertCount(RandomStudent::AMOUNT_STUDENT, $result);
    }
}
