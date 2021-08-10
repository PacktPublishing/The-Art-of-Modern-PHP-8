<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5;

require __DIR__ . '/../../../vendor/autoload.php';

use Book\Part2\Chapter5\TypeInheritance\ChildClass;
use Book\Part2\Chapter5\TypeInheritance\GrandParentInterfaceTwo;
use Book\Part2\Chapter5\TypeInheritance\RandomInterfaceFour;
use Book\Part2\Chapter5\TypeInheritance\RandomInterfaceTwo;
use ReflectionClass;
use stdClass;
use TypeError;

$child     = new ChildClass();
$callables = [
    ChildClass::class              => (static fn (ChildClass $classn) => true),
    stdClass::class                => (static fn (stdClass $class) => true),
    GrandParentInterfaceTwo::class => (static fn (GrandParentInterfaceTwo $class) => true),
    RandomInterfaceFour::class     => (static fn (RandomInterfaceFour $class) => true),
    RandomInterfaceTwo::class      => (static fn (RandomInterfaceTwo $class) => true),
    ReflectionClass::class         => (static fn (ReflectionClass $class) => true),
];
foreach ($callables as $hintFqn => $callable) {
    try {
        $result = $callable($child);
    } catch (TypeError) {
        $result = false;
    }
    echo \sprintf("\n%-60s %s", $hintFqn, $result ? 'true' : 'false');
}
