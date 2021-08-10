<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3;

use ErrorException;
use stdClass;
use Throwable;

/*
 * This bit of magic boilerplate will turn any old fashioned PHP error
 * into an ErrorException which you can then catch in your code.
 */
\set_error_handler(static function (
    int $severity,
    string $message,
    string $file,
    int $line
): bool {
    if (0 === (\error_reporting() & $severity)) {
        return true;
    }
    throw new ErrorException($message, 0, $severity, $file, $line);
});

/*
 * This bit of magic boilerplate becomes your ultimate fallback
 * should any exceptions bubble past all the catch blocks in your code.
 */
\set_exception_handler(static function (
    Throwable $throwable
): void {
    if (isset($_SERVER['DEBUG_MODE']) === false) {
        echo '
        An error has occurred, 
        
        please look at a happy picture whilst our engineers fix this for you :)
        
';

        return;
    }
    echo '
    
You are clearly a developer, please see a load of useful debug info:
    
' . \var_export($throwable, true);
});

echo '

And now to do something silly to trigger a PHP error....

';
echo \substr(string: new stdClass(), offset: 'cheese');
