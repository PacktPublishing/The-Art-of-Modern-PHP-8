<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

use Generator;

/** @return Generator<int> */
function gener8(int $num): Generator
{
    // be careful doing this kind of thing :)
    while (true) {
        // square
        $num *= $num;
        // check for modulus 8 and if found,
        if (($num % 8) === 0) {
            // yield a single value ready to start all over again
            yield $num;
        }
    }
}

foreach (gener8(num: 2) as $x) {
    echo "\n{$x}";
    if ($x > 2000) {
        break;
    }
}
