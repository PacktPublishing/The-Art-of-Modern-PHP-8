<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

// if we don't specify keys, they are ints starting from 0
$intKeysStringValues = ['a', 'b', 'c'];
echo "\n\$intKeysStringValues =" . \var_export($intKeysStringValues, true);

// we can specify string keys
$stringKeysFloatValues = ['one' => 1.0, 'two' => 2.0, 'three' => 3.0];
echo "\n\$stringKeysFloatValues =" .
     \var_export($stringKeysFloatValues, true);

// we can extract arrays into variables
[$a, $b, $c] = [1, 2, 3];
echo "\n\$a is {$a}";

// we can quickly create arrays with built in functions
$numbers = \range(start: 1, end: 5);
echo "\n\$numbers =" . \var_export($numbers, true);

$letters = \str_split(string: 'abcde');
echo "\n\$letters=" . \var_export($letters, true);
