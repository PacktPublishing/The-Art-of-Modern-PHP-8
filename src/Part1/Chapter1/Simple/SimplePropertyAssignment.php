<?php

declare(strict_types=1);

namespace Book\Part1\Chapter1\Simple;

class SimplePropertyAssignment
{
    private string $defined = 'defaultValue';

    public function __construct(
        private string $constructorParam = 'constructorValue'
    ) {
        // this is a bad idea, dynamicProperty is untyped and public
        $this->dynamicProperty = 'dynamicallyAdded';
    }
}