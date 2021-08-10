<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5;

require __DIR__ . '/../../../vendor/autoload.php';

use Book\Part2\Chapter5\TypeInheritance\ChildClass;
use Book\Part2\Chapter5\TypeInheritance\RandomInterfaceFour;
use stdClass;

$child                = new ChildClass();
$childFqn             = $child::class;
$childClassParents    = \array_values(\class_parents($child));
$childClassInterfaces = \array_values(\class_implements($child));

echo "\nClass Parents of {$childFqn}:\n" .
     \var_export($childClassParents, true);

echo "\nInterfaces of {$childFqn}:\n" .
     \var_export($childClassInterfaces, true);

function isInstanceOf(object $object, string $item): string
{
    $format = "\n%-60s %s\n";
    $result = \var_export($object instanceof $item, true);

    return \sprintf($format, "{$item}?", $result);
}

echo "\n\n{$childFqn} instance of checks:\n";

foreach ($childClassParents + $childClassInterfaces as $item) {
    echo isInstanceOf($child, $item);
}

$otherTypes = [RandomInterfaceFour::class, stdClass::class];
foreach ($otherTypes as $item) {
    echo isInstanceOf($child, $item);
}
