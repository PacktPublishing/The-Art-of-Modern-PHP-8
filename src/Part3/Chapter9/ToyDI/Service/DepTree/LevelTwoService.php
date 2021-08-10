<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI\Service\DepTree;

final class LevelTwoService
{
    public function __construct(
        public LevelTwoDep $levelTwoDep,
        public LevelThreeService $levelThreeService,
        public UbiquitousService $ubiquitousService
    ) {
    }
}
