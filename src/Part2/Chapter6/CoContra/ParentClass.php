<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\CoContra;

abstract class ParentClass
{
    abstract public function getSomething(
        ParentInterface $thing
    ): ParentInterface;
}
