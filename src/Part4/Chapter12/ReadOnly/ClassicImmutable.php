<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ClassicImmutable
{
    public function __construct(private int $num, private int $numWithDefault = 2)
    {

    }

    public function getNum(): int
    {
        return $this->num;
    }

    public function getNumWithDefault(): int
    {
        return $this->numWithDefault;
    }


}