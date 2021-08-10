<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\ForceInheritance;

/**
 * Class CANNOT be instantiated, CAN be inherited from.
 */
abstract class AbstractUser extends Person
{
    public function __construct(
        protected int $id,
        protected string $name
    ) {
        parent::__construct($name);
    }

    // Abstract function - must be defined in child classes
    abstract public function __toString();
}
