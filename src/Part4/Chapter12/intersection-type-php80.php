<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\IntersectionType\HelloWorldInterface;
use Book\Part4\Chapter12\IntersectionType\IntersectionPhp80;

require __DIR__ . '/../../../vendor/autoload.php';

/**
 * Before intersection types, any scenario where we need multiple interfaces, we have to create a new special interface
 * that extends the interfaces we require, and then of course we need to make sure whatever class we are using
 * implements our special interface. This can all lead to a lot of code bloat
 */
function acceptsHelloWorld(HelloWorldInterface $helloWorld): void
{
    echo $helloWorld->hello() . ' ' . $helloWorld->world();
}

acceptsHelloWorld(new IntersectionPhp80());