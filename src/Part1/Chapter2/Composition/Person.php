<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Composition;

final class Person
{
    public function __construct(
        private string $name
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
