<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1\Simple;

class SimpleWithGetter
{
    public function __construct(private string $name = 'Simon')
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}