<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Composition\User;

use Book\Part1\Chapter2\Composition\Person;

final class UserData
{
    public function __construct(
        private int $id,
        private Person $person
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->person->getName();
    }
}
