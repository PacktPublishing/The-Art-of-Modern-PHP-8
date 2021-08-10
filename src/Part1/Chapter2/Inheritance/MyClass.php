<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Inheritance;

/**
 * Single Inheritance of Classes
 * Multiple Implementation of Interfaces.
 */
final class MyClass extends MyParentClass
    implements GetsBarInterface, GetsFooInterface
{
    public function getFoo(): int
    {
        return $this->foo;
    }

    public function getBar(): int
    {
        return $this->bar;
    }
}
