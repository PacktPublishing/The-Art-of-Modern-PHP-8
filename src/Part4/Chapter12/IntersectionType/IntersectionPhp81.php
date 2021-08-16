<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\IntersectionType;

class IntersectionPhp81 implements HelloInterface, WorldInterface
{

    public function hello(): string
    {
        return 'hello';
    }

    public function world(): string
    {
        return 'world';
    }
}