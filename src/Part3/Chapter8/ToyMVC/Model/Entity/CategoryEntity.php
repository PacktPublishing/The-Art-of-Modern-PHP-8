<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Entity;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection;

final class CategoryEntity implements EntityInterface
{
    public function __construct(
        private Uuid $uuid,
        private string $name,
        private PostCollection $postCollection
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPostCollection(): PostCollection
    {
        return $this->postCollection;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }
}
