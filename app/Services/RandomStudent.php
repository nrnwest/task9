<?php

declare(strict_types=1);

namespace App\Services;

use App\DTO\NameStudentDTO;

class RandomStudent
{
    public const AMOUNT_STUDENT = 200;
    private const UNIQUE_NAMES = 20;
    private const START_ID = 1;
    private const AMOUNT_CURSE = 10;
    private const AMOUNT_GROUP = 10;
    private const AMOUNT_STUDENT_COURSE = 3;
    private const AMOUNT_STUDENT_GROUP_MAX = 30;
    private const AMOUNT_STUDENT_GROUP_MIN = 10;

    private array $firstName = [];
    private array $lastName = [];
    private array $fullName = [];

    public function __construct(\Faker\Generator $faker)
    {
        for ($i = 0; $i < self::UNIQUE_NAMES; $i++) {
            $this->lastName[] = $faker->lastName();
            $this->firstName[] = $faker->firstName();
        }
    }

    public function getFullName(): array
    {
        for ($i = 0; $i < self::AMOUNT_STUDENT;) {
            $name = new NameStudentDTO(
                $this->firstName[array_rand($this->firstName)],
                $this->lastName[array_rand($this->lastName)]
            );
            $glueName = $name->getGlueName();
            if (isset($this->fullName[$glueName]) === false) {
                $this->fullName[$glueName] = $name;
                $i++;
            }
        }

        return $this->fullName;
    }

    public function getAmountStudentGroup(): array
    {
        return range(self::AMOUNT_STUDENT_GROUP_MIN, self::AMOUNT_STUDENT_GROUP_MAX);
    }

    public function getStudentsId(): array
    {
        return range(self::START_ID, self::AMOUNT_STUDENT);
    }

    public function getGroupsId(): array
    {
        return range(self::START_ID, self::AMOUNT_GROUP);
    }

    public function getCoursesId(): array
    {
        return range(self::START_ID, self::AMOUNT_CURSE);
    }

    public function getAmountCourseStudent(): array
    {
        return range(self::START_ID, self::AMOUNT_STUDENT_COURSE);
    }

    public function getCourseStudent(array $coursesId, array $studentsId, array $amountCurseStudent): array
    {
        $result = [];
        foreach ($studentsId as $studentId) {
            $amountCurse = $amountCurseStudent[array_rand($amountCurseStudent)];
            $coursesKeys = array_rand($coursesId, $amountCurse);
            if (is_int($coursesKeys)) {
                $coursesKey[0] = $coursesKeys;
            } else {
                $coursesKey = $coursesKeys;
            }
            foreach ($coursesKey as $key) {
                $result[$studentId][] = $coursesId[$key];
            }
        }

        return $result;
    }

    /**
     * @return array [id_student] = [id_group|null]
     */
    public function getGroupStudents(array $groupsId, array $studentsId, array $amountStudentGroups): array
    {
        $result = [];
        foreach ($groupsId as $groupId) {
            $amountStudentGroup = $amountStudentGroups[array_rand($amountStudentGroups)];
            for ($i = 0; $amountStudentGroup > $i; $i++) {
                if (empty($studentsId)) {
                    break;
                }
                $keyStudent = array_rand($studentsId);
                $result[$studentsId[$keyStudent]] = $groupId;
                unset($studentsId[$keyStudent]);
            }
        }
        // if there are students, we prescribe that they are without a group
        foreach ($studentsId as $studentId) {
            $result[$studentId] = null;
        }

        return $result;
    }
}
