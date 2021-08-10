<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI\Service\MathsStuff;

final class MultiplicationService implements MathsInterface
{
    public function __construct()
    {
    }

    public function getResult(
        float | int $numberOne,
        float | int $numberTwo
    ): int | float {
        return $numberOne * $numberTwo;
    }
}
