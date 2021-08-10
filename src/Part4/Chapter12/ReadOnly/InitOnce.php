<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class InitOnce
{
    public readonly int $foo;

    /**
     * It is only possible to call this method once. Any subsequent call will fail with a fatal error
     */
    public function setFoo(int $bar): void
    {
        $this->foo = $bar;
    }
}