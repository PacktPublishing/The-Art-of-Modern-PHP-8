<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\View\Data;

use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;

final class PostPageData implements TemplateDataInterface
{
    public function __construct(
        private PostEntity $postEntity
    ) {
    }

    public function getPost(): PostEntity
    {
        return $this->postEntity;
    }
}
