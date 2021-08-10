<?php

declare(strict_types=1);

namespace Book\Part4\Chapter10\Dependencies;

final class ClassTwo
{
    public function __construct(private ClassOne $classOne)
    {
    }

    public function getClassOne(): ClassOne
    {
        return $this->classOne;
    }
}
