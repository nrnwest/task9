<?php

declare(strict_types=1);

namespace App\DTO;

class CourseDTO
{
    private array $courses = [
        'mathematics',
        'geometry',
        'drawing',
        'singing',
        'dancing',
        'chemistry',
        'physics',
        'astrophysics',
        'drawing',
        'algebra'
    ];

    public function getCourses(): array
    {
        return $this->courses;
    }
}
