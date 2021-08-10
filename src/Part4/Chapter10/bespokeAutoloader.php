<?php

declare(strict_types=1);

namespace Book\Part4\Chapter10;

use Book\Part4\Chapter10\Dependencies\ClassOne;
use Book\Part4\Chapter10\Dependencies\ClassTwo;
use RuntimeException;

/*
 * We call spl_autoload_register and pass in our bespoke closure which handles autoloading.
 *
 * This autoloader has been crafted to load classes from the `Dependencies` sub folder of the Chapter10 directory.
 * This means this is not a good example for general purpose autoloading!
 */
\spl_autoload_register(static function (string $classFqn): void {
    // find the position of the last / character
    $offset = \strrchr($classFqn, '\\');
    if ($offset === false) {
        throw new RuntimeException('Failed finding \\ in $classFqn ' . $classFqn);
    }
    // get all the text after the last / character
    $className = \substr($offset, 1);

    // now check for the class filename in the Dependencies sub directory based on this text
    $path = __DIR__ . '/Dependencies/' . $className . '.php';
    if (!\file_exists($path)) {
        // return on failure allows the next autoloader in the chain to have a go at loading this class
        return;
    }
    require $path;
});

/**
 * And we can then freely refer to classes without any messy work to locate and require PHP files.
 */
$class = new ClassTwo(new ClassOne());
