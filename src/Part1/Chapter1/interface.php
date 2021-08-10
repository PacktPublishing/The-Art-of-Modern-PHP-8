<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1;

interface GetsSomethingInterface
{
    /**
     * This interface defines one method.
     * It must be called "getSomething" and it must return a string
     */
    public function getSomething(): string;
}

class GetsSomethingClass implements GetsSomethingInterface
{
    public function getSomething(): string
    {
        return 'something';
    }
}

echo "\n" . (new GetsSomethingClass())->getSomething();