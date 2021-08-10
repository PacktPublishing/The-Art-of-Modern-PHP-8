<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\Enums;

enum BasicEnum implements ProvidesRandomCaseInterface
{
    /** Enums define one or more cases that they can possibly exist as */
    case Foo;
    case Bar;

    /** Enums can use traits as long as they don't have properties */
    use RandomCaseTrait;
}