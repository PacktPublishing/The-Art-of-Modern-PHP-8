<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\IntersectionType;

/**
 * This interface has no value other than combining the two interfaces.
 * This adds bloat and obfuscation to our code.
 */
interface HelloWorldInterface extends HelloInterface, WorldInterface
{

}