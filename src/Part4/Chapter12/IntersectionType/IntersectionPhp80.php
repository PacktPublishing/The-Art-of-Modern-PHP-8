<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\IntersectionType;

class IntersectionPhp80 implements HelloWorldInterface
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