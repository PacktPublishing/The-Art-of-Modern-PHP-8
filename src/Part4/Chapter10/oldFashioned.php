<?php

declare(strict_types=1);

namespace Book\Part4\Chapter10;

/**
 * Old fashioned PHP code where we have to manually bring in the PHP files for any classes we want to use.
 *
 * We use `require_once` because there was always a risk that the same file might be used in a standard `require` more
 * than once. Declaring the same class twice causes a fatal error.
 *
 * Imagine something real-world rather than this contrived example
 */
require_once __DIR__ . '/Dependencies/ClassOne.php';
require_once __DIR__ . '/Dependencies/ClassTwo.php';

use Book\Part4\Chapter10\Dependencies\ClassOne;
use Book\Part4\Chapter10\Dependencies\ClassTwo;

$class = new ClassTwo(new ClassOne());
