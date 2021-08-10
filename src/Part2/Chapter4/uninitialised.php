<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

$untyped = new class() {
    public $uninitialised;
};

echo "\nYou can access untyped properties and the value is: " .
     \var_export($untyped->uninitialised, true);

$typed = new class() {
    public string $uninitialised;
};

echo "\nHowever, try this with typed properties..\n and it goes:\n\n";
echo $typed->uninitialised;
