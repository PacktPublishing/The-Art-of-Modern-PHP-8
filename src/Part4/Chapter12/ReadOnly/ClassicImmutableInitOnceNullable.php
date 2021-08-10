<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ClassicImmutableInitOnceNullable
{
    private ?int $foo;

    public function getFoo(): ?int
    {
        return $this->foo;
    }

    public function setFoo(?int $bar): void
    {
        if (isset($this->foo)) {
            throw new \RuntimeException('You can not set foo more than once');
        }
        $this->foo = $bar;
    }
}