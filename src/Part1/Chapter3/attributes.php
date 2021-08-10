<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3;

require __DIR__ . '/../../../vendor/autoload.php';

use Book\Part1\Chapter3\Attributes\Bar;
use Book\Part1\Chapter3\Attributes\Baz;
use Book\Part1\Chapter3\Attributes\Foo;
use Book\Part1\Chapter3\Attributes\WrittenByAttribute;
use ReflectionClass;
use RuntimeException;

/*
 * Now we can loop over the classes
 * and dynamically pull out the attribute,
 * get an instance of the attribute
 * and then call methods on it
 */
foreach ([Foo::class, Bar::class, Baz::class] as $class) {
    $reflectionAttributes = (new ReflectionClass($class))->getAttributes(WrittenByAttribute::class);

    $reflectionAttribute = $reflectionAttributes[0]
                           ?? throw new RuntimeException('Failed getting attribute for ' . $class);

    $writtenBy = $reflectionAttribute->newInstance();

    /** @var WrittenByAttribute $writtenBy */
    echo "\nClass " . $class . ' was written by ' . $writtenBy->getName();
}
