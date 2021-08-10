<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Repository;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;

interface PostRepositoryInterface
{
    public function loadAll(): PostCollection;

    public function load(Uuid $uuid): PostEntity;
}
