<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Composition\User;

use Book\Part1\Chapter2\Composition\UrlCollection;

final class FrontEndUser implements UserInterface
{
    public function __construct(
        private UserData $userData,
        private UrlCollection $recentlyViewedPages
    ) {
    }

    public function __toString(): string
    {
        return "front end user {$this->userData->getName()} ({$this->userData->getId()}) has recently viewed: " .
               \print_r($this->recentlyViewedPages->getUrls(), true);
    }
}
