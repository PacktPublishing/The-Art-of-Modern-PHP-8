<?php

declare(strict_types=1);

namespace Book\Part4\Chapter10;

use Book\Part4\Chapter10\Dependencies\ClassOne;
use Book\Part4\Chapter10\Dependencies\ClassTwo;

/**
 * This line brings in the Composer autoloader which just takes care of everything for us.
 */
require __DIR__ . '/../../../vendor/autoload.php';

/**
 * And we can then freely refer to classes without any messy work to locate and require PHP files.
 */
$class = new ClassTwo(new ClassOne());
