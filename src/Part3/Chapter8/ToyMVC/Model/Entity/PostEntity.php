<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Entity;

final class PostEntity implements EntityInterface
{
    public function __construct(
        private Uuid $uuid,
        private string $title,
        private string $contentHtml
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContentHtml(): string
    {
        return $this->contentHtml;
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }
}
