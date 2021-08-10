<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2;

use Book\Part1\Chapter2\StaticAccess\ChildClass;
use Book\Part1\Chapter2\StaticAccess\ParentClass;

require __DIR__ . '/../../../vendor/autoload.php';

echo "\n\nParentClass::getStringSelf   =  " . ParentClass::getStringSelf();
echo "\n\nParentClass::getStringStatic =  " . ParentClass::getStringStatic();
echo "\n\nChildClass::getStringSelf    =  " . ChildClass::getStringSelf();
echo "\n\nChildClass::getStringStatic  =  " . ChildClass::getStringStatic();
