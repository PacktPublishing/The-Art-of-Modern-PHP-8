<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4\ShortHand;

final class SmallClass
{
    public function __construct(
        public ?string $foo
    ) {
    }
}
