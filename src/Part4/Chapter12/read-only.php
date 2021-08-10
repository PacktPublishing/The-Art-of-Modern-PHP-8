<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\ClassicImmutable;
use Book\Part4\Chapter12\ReadOnly\ReadOnlyDTO;

require __DIR__ . '/../../../vendor/autoload.php';

$immutable = new ClassicImmutable(1);

echo "\nJust created, the Immutable required param num is {$immutable->getNum()} and the param with default is {$immutable->getNumWithDefault()}";

$readonly = new ReadOnlyDTO(1);

echo "\nJust created, the Readonly required param num is {$readonly->num} and the param with default is {$readonly->numWithDefault}";


