<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI\Service\DepTree;

final class LevelOneService
{
    public function __construct(
        public LevelOneDep $levelOneDep,
        public LevelTwoService $levelTwoService,
        public UbiquitousService $ubiquitousService
    ) {
    }
}
