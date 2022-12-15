<?php

namespace App\Services;

class TestService1
{
    public function __construct(private int $year)
    {

    }

    public function getYear()
    {
        return $this->year;
    }

}
