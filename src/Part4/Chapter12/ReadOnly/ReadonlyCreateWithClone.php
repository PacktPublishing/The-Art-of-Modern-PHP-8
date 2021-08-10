<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ReadonlyCreateWithClone
{
    private readonly mixed $expensiveThing;

    public function __construct(public readonly int $foo){
        // do something to generate the expensive thing
        $this->expensiveThing='ooh that was hard work';
    }

    public function with(int $foo):self{
        // to avoid having to recreate the expensive thing and to generally make this easy, a common pattern is to use clone
        $clone = clone $this;
        $clone->foo = $foo;

        return $clone;
    }
}