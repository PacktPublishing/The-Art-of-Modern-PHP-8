<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6;

use Book\Part2\Chapter6\TypeDeclarations\ModernClass;
use Book\Part2\Chapter6\TypeDeclarations\YeOldeClass;
use Book\Part2\Chapter6\TypeDeclarations\YeOldeDefensive;
use ReflectionClass;
use RuntimeException;
use stdClass;
use Throwable;

require __DIR__ . '/../../../vendor/autoload.php';

/*
 * Notice how I can totally misuse this class,
 * despite YeOlde Developer's best efforts at clearly documenting what I'm supposed to do,
 * like a classic user I can find weird and wonderful ways of stabbing myself in the eye
 */
echo "\nGetting new instance of YeOldeClass";
$yeOlde = new YeOldeClass([1, 2, 3], new stdClass(), '1', 123, 'yes');

echo "\nYeOlde number is a " . \gettype($yeOlde->getANumber()) .
     ' with a value of ' . \var_export($yeOlde->getANumber(), true);

/*
 * I can't get past the defensive class, though
 */
echo "\n\nGetting new instance of YeOldeDefensiveClass";
try {
    $yeOldeDefensive =
        new YeOldeDefensive([1, 2, 3], new stdClass(), '1', 123, 'yes');
} catch (RuntimeException $runtimeException) {
    echo "\nFailed instantiating, got this error: " .
         $runtimeException->getMessage();
}
/*
 * Oh but wait, a determined user can always find a way to stab themselves
 */
echo "\nNow trying to get an instance of YeOldeDefensiveClass being sneaky and using reflection";
$yeOldeDefensive =
    (new ReflectionClass(YeOldeDefensive::class))->newInstanceWithoutConstructor();
echo "\nYeOldeDefensive number is a " .
     \gettype($yeOldeDefensive->getANumber()) .
     ' with a value of ' .
     \var_export($yeOldeDefensive->getANumber(), true);

/*
 * Now the same class in modern PHP, there are lots of barriers to even the most determined user stabbing themselves
 */
echo "\n\nTrying to get an instance of ModernClass with invalid params";
try {
    $modern = new ModernClass(new stdClass(), '1', 123, 'yes', ...[1, 2, 3]);
} catch (Throwable $throwable) {
    echo "\nAnd failed, got an instance of " . $throwable::class .
         " with an error message:\n {$throwable->getMessage()}";
}

echo "\n\nNow trying to get an instance of ModernClass being sneaky and using reflection";
$modern =
    (new ReflectionClass(ModernClass::class))->newInstanceWithoutConstructor();
try {
    echo "\nModern number is a " . \gettype($modern->getANumber()) .
         ' with a value of ' . \var_export($modern->getANumber(), true);
} catch (Throwable $throwable) {
    echo "\nAnd failed, got an instance of " . $throwable::class .
         " with an error message:\n {$throwable->getMessage()}";
}
