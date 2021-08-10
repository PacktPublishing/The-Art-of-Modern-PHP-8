<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

use Book\Part2\Chapter4\ShortHand\Container;
use Book\Part2\Chapter4\ShortHand\SmallClass;

require __DIR__ . '/../../../vendor/autoload.php';

$object = new Container(
    new SmallClass('foo val'),
    null
);

/*
 * First lets compare some classic if/else code with a ternary operator
 */
// Classic if/else code checking
if ($object->bool1 === true) {
    $value1 = 'bool 1 is true';
} else {
    $value1 = 'bool 1 is false';
}

// Ternary
// Note - if your variable or value is not a bool, it will be type juggled to one.
// You can make ternary strict by checking for identity (===) with true/false directly
$value2 = $object->bool1 === true ? 'bool 1 is true' : 'bool 1 is false';

echo "\n" . '$value1===$value2? ' . \var_export($value1 === $value2, true);

// classic null checking monstrosity (deliberately verbose)
if ($object->property2 === null) {
    if ($object->property1 === null) {
        $value3 = null;
    } else {
        if ($object->property1->foo === null) {
            $value3 = null;
        } else {
            $value3 = $object->property1->foo;
        }
    }
} else {
    if ($object->property2->foo === null) {
        $value3 = null;
    } else {
        $value3 = $object->property2->foo;
    }
}

// null coalesce & nullsafe operator
$value4 = $object->property2?->foo ?? $object->property1?->foo;

echo "\n" . '$value3===$value4? ' . \var_export($value3 === $value4, true);
