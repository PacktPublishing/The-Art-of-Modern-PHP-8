<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI\Service\DepTree;

final class LevelThreeService
{
    public function __construct(
        public LevelThreeDep $levelThreeDep,
        public UbiquitousService $ubiquitousService
    ) {
    }
}
