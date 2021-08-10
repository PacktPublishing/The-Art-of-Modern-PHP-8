<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ReadOnlyDTO
{
    public function __construct(public readonly int $num, public readonly int $numWithDefault=2)
    {

    }
}