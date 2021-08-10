<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1\Simple;

class SimpleManualAssignment
{
    private string $name;

    public function __construct(string $name = 'Simon')
    {
        // take the constructor param and manually assign to class property
        $this->name = $name;
    }
}