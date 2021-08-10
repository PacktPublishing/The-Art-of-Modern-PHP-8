<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\Enums;

trait RandomCaseTrait
{
    public function getRandomCaseName(): string
    {
        $cases     = self::cases();
        $randomKey = \array_rand($cases);

        return $cases[$randomKey]->name;
    }
}