<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\ReadonlyCreateManually;

require __DIR__ . '/autoload.php';

$object      = new \stdClass();
$object->num = 100;
$dto         = new ReadonlyCreateManually(foo: 1, bar: 'lorem ipsum', object: $object);
echo "\nOriginal DTO: " . var_export($dto, true);

$newObject         = new \stdClass();
$newObject->string = 'abc123';

$new = $dto->with(bar: 'updated string', object: $newObject);
echo "\nNew DTO created with overridden properties: " . var_export($new, true);