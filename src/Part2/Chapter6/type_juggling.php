<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6;

$string = '1 boring string';
echo "\n\$string = " . \var_export($string, true);

$float = (float)$string;
echo "\n\$float = " . \var_export($float, true);

$int = (int)$float;
echo "\n\$int = " . \var_export($int, true);

$bool = (bool)$int;
echo "\n\$bool = " . \var_export($bool, true);

$string = (string)$bool;
echo "\n\$string = " . \var_export($string, true);
