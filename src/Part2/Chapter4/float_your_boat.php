<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

// seems OK...
echo "\n(0.2+0.2) = 0.4? " . \var_export((0.2 + 0.2) === 0.4, true) . "\n";

// wait, what?
echo "\n(0.7+0.1) = 0.8? " . \var_export((0.7 + 0.1) === 0.8, true) . "\n";
