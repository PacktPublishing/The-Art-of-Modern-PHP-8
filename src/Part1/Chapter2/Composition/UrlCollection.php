<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\Composition;

final class UrlCollection
{
    /** @var string[] */
    private array $urls;

    public function __construct(string ...$urls)
    {
        $this->urls = $urls;
    }

    /** @return string[] */
    public function getUrls(): array
    {
        return $this->urls;
    }
}
