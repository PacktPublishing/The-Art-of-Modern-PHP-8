<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2;

class MyParentClass
{
    protected int  $foo     = 1;
    private string $private = 'hidden';
}

class MyChildClass extends MyParentClass
{
    private int $bar = 2;

    public function getFoo(): int
    {
        // access parent class property
        return $this->foo;
    }

    public function getBar(): int
    {
        // access this class property
        return $this->bar;
    }

    public function getPrivate(): string
    {
        // THIS IS NOT POSSIBLE
        // return $this->private;
        return 'NOT POSSIBLE';
    }
}
