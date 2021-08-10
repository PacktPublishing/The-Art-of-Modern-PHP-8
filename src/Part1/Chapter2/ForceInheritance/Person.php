<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\ForceInheritance;

/**
 * Class CAN be instantiated and inherited from.
 */
class Person
{
    public function __construct(
        protected string $name
    ) {
    }

    /** Method CANNOT be overridden in child classes */
    final public function getName(): string
    {
        return $this->name;
    }
}
