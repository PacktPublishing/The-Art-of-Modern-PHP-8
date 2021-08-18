<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\ReadOnlyDTO;

require __DIR__ . '/autoload.php';

$readonly = new ReadOnlyDTO(1);

echo "\nJust created, the Readonly required param num is {$readonly->num} and the param with default is {$readonly->numWithDefault}";

echo "\nSo what happens if we get clever and try to defeat the readonly restriction..?\n\n";
$reflection = new \ReflectionClass($readonly);
$property   = $reflection->getProperty('num');
$property->setValue($readonly, 10);