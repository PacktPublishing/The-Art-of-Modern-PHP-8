<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\ClassicImmutableInitOnceNullable;

require __DIR__ . '/../../../vendor/autoload.php';

$dto = new ClassicImmutableInitOnceNullable();
$dto->setFoo(null);
echo "\n Foo is " . var_export($dto->getFoo(), true);
$dto->setFoo(1);
echo "\n Foo is " . var_export($dto->getFoo(), true);