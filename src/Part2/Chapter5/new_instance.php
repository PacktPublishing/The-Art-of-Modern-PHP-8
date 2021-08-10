<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5;

require __DIR__ . '/../../../vendor/autoload.php';

use Book\Part2\Chapter5\NewInstance\Cloner;
use Book\Part2\Chapter5\NewInstance\Sleeper;
use ReflectionClass;

echo "\nSome cloning:";
$cloner  = new Cloner();
$cloner2 = clone $cloner;
echo "\nCloner ID: {$cloner->getObjectId()}, Cloner2 ID: {$cloner2->getObjectId()}";
echo "\n\$cloner == \$cloner2? " . \var_export($cloner === $cloner2, true);
echo "\n This is false because \$cloner state is {$cloner->state} but \$cloner2 state is {$cloner2->state}  ";

echo "\n\nAnd some reflection";
$clonerReflection = (new ReflectionClass(Cloner::class))->newInstance();
echo "\n\$cloner == \$clonerReflection? " .
     \var_export($cloner === $clonerReflection, true);
$clonerReflNoConstruct =
    (new ReflectionClass(Cloner::class))->newInstanceWithoutConstructor();
echo "\n\$cloner == \$clonerReflNoConstruct? " .
     \var_export($cloner === $clonerReflNoConstruct, true);
echo "\n This is false because \$cloner state is {$cloner->state} but \$clonerReflNoConstruct state is {$clonerReflNoConstruct->state}  ";

echo "\n\nAnd some serializing/unserializing";
$sleeper       = new Sleeper();
$sleeperAsleep = \serialize($sleeper);
echo "\nSleeper Asleep:\n{$sleeperAsleep}";

echo "\nNow unserializing with allowed classes:";
$sleeper2 =
    \unserialize($sleeperAsleep, ['allowed_classes' => [Sleeper::class]]);
echo "\n\$sleeper === \$sleeper2? " .
     \var_export($sleeper === $sleeper2, true);
