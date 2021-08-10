<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1;

use Book\Part1\Chapter1\Simple\SimplePropertyAssignment;

require __DIR__ . '/../../../vendor/autoload.php';
$instance = new SimplePropertyAssignment();

// dynamic property is public
echo "\n" . $instance->dynamicProperty;

// dynamic property is untyped and can be anything
$instance->dynamicProperty = 123;

echo "\n" . $instance->dynamicProperty;