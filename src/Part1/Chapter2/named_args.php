<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2;

/*
 * array_filter ( array $array , callable|null $callback = null , int $mode = 0 ) : array
 */
\array_filter(
    array: [
        true,
        false,
        true,
    ],
    callback: static function ($item): bool {
        return $item === true;
    }
);

/*
 * array_map ( callable|null $callback , array $array , array ...$arrays ) : array
 */
\array_map(
    array: [
        true,
        false,
        true,
    ],
    callback: static function ($item): bool {
        return !$item;
    }
);
