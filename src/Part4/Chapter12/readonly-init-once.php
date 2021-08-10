<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\InitOnce;

require __DIR__ . '/../../../vendor/autoload.php';

$initOnce = new InitOnce();

$initOnce->setFoo(1);
echo "\nfoo is now {$initOnce->foo}";

echo "\nthe next call will fail..\n\n";
$initOnce->setFoo(2);