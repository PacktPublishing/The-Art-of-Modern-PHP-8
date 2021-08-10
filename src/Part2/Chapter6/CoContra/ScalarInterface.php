<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\CoContra;

interface ScalarInterface
{
    public function doSomething(string | int $foo): string;
}
