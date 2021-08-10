<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Entity;

interface EntityInterface
{
    public function getUuid(): Uuid;
}
