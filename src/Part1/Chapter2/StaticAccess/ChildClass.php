<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\StaticAccess;

final class ChildClass extends ParentClass
{
    protected const ZIP          = '567';
    protected static string $foo = 'boo';
}
