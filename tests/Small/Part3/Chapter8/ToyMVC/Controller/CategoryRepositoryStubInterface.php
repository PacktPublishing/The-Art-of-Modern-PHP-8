<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\CategoryRepositoryInterface;

interface CategoryRepositoryStubInterface extends CategoryRepositoryInterface
{
    public function getUuid(): Uuid;

    public function getCategoryName(): string;

    public function getPostCollection(): PostCollection;
}
