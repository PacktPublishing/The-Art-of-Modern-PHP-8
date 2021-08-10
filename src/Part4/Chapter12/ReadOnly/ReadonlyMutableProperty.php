<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ReadonlyMutableProperty
{
    public function __construct(public readonly \DateTime $dateTime)
    {
    }

}