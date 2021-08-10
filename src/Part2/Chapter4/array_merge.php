<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

/**
 * Simulating the kind of scenario this happens in.
 *
 * @return string[]
 */
function loadFromDb(): array
{
    return \array_fill(0, 10, 'foo');
}

$howManyRows = 1000;
$result      = [];
$start       = \microtime(true);
for ($row = 0; $row < $howManyRows; ++$row) {
    $result = \array_merge($result, loadFromDb());
}
$takenLoop = \microtime(true) - $start;
echo "\nArray merge in a loop took " . \round($takenLoop, 4);

$toMerge = [];
$start   = \microtime(true);
for ($row = 0; $row < $howManyRows; ++$row) {
    $toMerge[] = loadFromDb();
}
$result     = \array_merge(...$toMerge);
$takenSplat = \microtime(true) - $start;
echo "\nSingle array merge with splat took " . \round($takenSplat, 4);

$percentSlower = \round((($takenLoop / $takenSplat) * 100), precision: 2);
echo "\nThat means that array merge in a loop is {$percentSlower}% slower!";
