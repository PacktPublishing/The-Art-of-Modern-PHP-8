<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ExtendedImmutable extends ClassicImmutable
{
    public function doStuff(): void
    {
        //code that does something and nothing stops it updating num
        $this->num *= 10;
    }
}