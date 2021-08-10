<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI;

interface ServiceDefinitionInterface
{
    /** @return array<int, string> */
    public function getIds(): array;

    /** @return class-string */
    public function getClassFullyQualifiedName(): string;
}
