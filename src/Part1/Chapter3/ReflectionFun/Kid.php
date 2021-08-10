<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3\ReflectionFun;

final class Kid
{
    public function __construct(
        private string $name,
        private int $age
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    private function nameChange(string $newName): void
    {
        $this->name = $newName;
    }
}
