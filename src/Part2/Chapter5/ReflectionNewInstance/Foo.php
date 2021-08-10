<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5\ReflectionNewInstance;

final class Foo
{
    public string $bar = 'default';

    public function __construct(string $bar)
    {
        $this->bar = $bar;
    }
}
