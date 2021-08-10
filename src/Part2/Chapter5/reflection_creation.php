<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5;

use Book\Part2\Chapter5\ReflectionNewInstance\Foo;
use ReflectionClass;

require __DIR__ . '/../../../vendor/autoload.php';

$reflectionClass = new ReflectionClass(Foo::class);

// This is pretty much the same as just calling new Foo('new instance with args');
// It becomes useful when you don't actually know what class you are instantiating
// because you are deep into the world of meta programming
$newInstance = $reflectionClass->newInstance('new instance with args');
echo "\n\$newInstance->bar = {$newInstance->bar}";

// This is almost the same as new instance, but we pass an array rather than just listing arguments.
// This is less useful now that we have the splat operator, but you might find it useful
// when you want to build an array before creating the instance
$newInstanceArgs = $reflectionClass->newInstanceArgs(['new instance with array args']);
echo "\n\$newInstanceArgs->bar = {$newInstanceArgs->bar}";

// Finally, bypassing the constructor completely. This trick is used by Doctrine extensively
// and is the first thing that confuses people who didn't know this was possible.
// Clearly there are major risks in bypassing the constructor as generally the constructor
// will be responsible for ensuring that the class properties are all properly set up and valid.
// Bypassing this safety is not something to be done lightly!
$newInstanceWithoutConstructor = $reflectionClass->newInstanceWithoutConstructor();
echo "\n\$newInstanceWithoutConstructor->bar = {$newInstanceWithoutConstructor->bar}";
