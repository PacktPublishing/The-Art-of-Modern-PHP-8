<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\IntersectionType\HelloInterface;
use Book\Part4\Chapter12\IntersectionType\WorldInterface;
use Book\Part4\Chapter12\IntersectionType\IntersectionPhp81;

require __DIR__ . '/../../../vendor/autoload.php';

/**
 * Instead, with an Intersection Type, we can simply list the interfaces required to be implemented for the given
 * method/function to work, and we do not need to enforce anything further.
 */
function acceptsHelloWorld(HelloInterface&WorldInterface $helloWorld): void
{
    echo $helloWorld->hello() . ' ' . $helloWorld->world();
}

acceptsHelloWorld(new IntersectionPhp81());