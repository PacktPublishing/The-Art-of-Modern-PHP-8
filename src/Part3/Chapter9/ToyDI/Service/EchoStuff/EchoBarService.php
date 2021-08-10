<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI\Service\EchoStuff;

final class EchoBarService implements EchoStuffInterface
{
    public function __construct()
    {
    }

    public function echoSomething(): void
    {
        echo "\nbar";
    }
}
