<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI;

final class SimpleServiceDefinition implements ServiceDefinitionInterface
{
    /**
     * @param array<int,string> $ids
     * @param class-string      $className
     */
    public function __construct(
        private array $ids,
        private string $className
    ) {
    }

    /** @return array<int,string> */
    public function getIds(): array
    {
        return $this->ids;
    }

    /** @return class-string */
    public function getClassFullyQualifiedName(): string
    {
        return $this->className;
    }
}
