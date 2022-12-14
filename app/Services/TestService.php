<?php

namespace App\Services;

class TestService
{
    public function __construct(private int $year)
    {

    }

    public function getYear()
    {
        return $this->year;
    }

}
