<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1\Simple;

class SimpleClass
{
    public function __construct(public string $name = 'Simon')
    {
    }
}