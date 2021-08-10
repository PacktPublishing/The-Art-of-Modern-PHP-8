<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\Enums;

interface ProvidesRandomCaseInterface
{
    public function getRandomCaseName(): string;
}