<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Repository;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\CategoryCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\CategoryEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;

interface CategoryRepositoryInterface
{
    public function loadAll(): CategoryCollection;

    public function load(Uuid $uuid): CategoryEntity;
}
