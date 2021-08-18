<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\ReadonlyCreateWithClone;

require __DIR__ . '/autoload.php';

$dto = new ReadonlyCreateWithClone(1);
$new = $dto->with(2);