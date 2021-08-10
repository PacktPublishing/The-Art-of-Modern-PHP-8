<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5\TypeInheritance;

/**
 * Can only inherit from a single parent class
 * but can implement multiple interfaces, each of which can have their own inheritance chain.
 */
final class ChildClass extends ParentClass implements ParentInterfaceOne, ParentInterfaceTwo, RandomInterfaceThree
{
}
