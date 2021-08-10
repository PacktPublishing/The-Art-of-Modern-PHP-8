<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3\ExceptionSimple;

use Throwable;

/**
 * This is a special kind of object. It acts just like a function as it
 * implements the magic __invoke method.
 */
final class Dumper
{
    public function __invoke(Throwable $throwable): string
    {
        return "
Caught {$this->getClass($throwable)} with message:

{$throwable->getMessage()}

Stack Trace:
{$throwable->getTraceAsString()}    
";
    }

    private function getClass(Throwable $throwable): string
    {
        return $throwable::class;
    }
}
