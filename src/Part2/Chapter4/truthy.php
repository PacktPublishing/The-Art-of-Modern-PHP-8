<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

require __DIR__ . '/../../../vendor/autoload.php';

use Book\Part2\Chapter4\Truthy\TruthDumper;

echo TruthDumper::createTable(
    null,
    0,
    0.0,
    '0',
    '',
    false,
    true,
    1,
    'a',
    01,
    -1,
    0.1
);
