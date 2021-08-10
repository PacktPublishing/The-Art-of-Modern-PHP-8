<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2;

(static function (string ...$numbers): void {
    echo \implode("\n", $numbers);
})(...['one', 'two', 'three']);
