<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

/**
 * Special autoloader for CH12 as composer deps won't install in 8.1
 */
spl_autoload_register(static function (string $fqn): void {
    $subName = substr($fqn, strlen( __NAMESPACE__));
    $path    = str_replace('\\', DIRECTORY_SEPARATOR, $subName) . '.php';
    require __DIR__ . DIRECTORY_SEPARATOR . $path;
});