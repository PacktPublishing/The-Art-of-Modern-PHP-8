<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Collection;

use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;
use Countable;
use Iterator;
use OutOfBoundsException;

/**
 * @implements Iterator<string, PostEntity>
 */
final class PostCollection implements Iterator, Countable
{
    /** @var PostEntity[] */
    private array $postEntities;

    public function __construct(PostEntity ...$postEntities)
    {
        $this->postEntities = $postEntities;
        $this->rewind();
    }

    public function next(): bool | PostEntity
    {
        return \next($this->postEntities);
    }

    /**
     * Careful here, you can return non scalar types, but expect problems
     * later on that can be tricky to debug. Instead, return a string or int
     * so that PHP gets an array type it expects.
     */
    public function key(): string
    {
        return (string)$this->current()->getUuid();
    }

    public function current(): PostEntity
    {
        $current = \current($this->postEntities);

        return $current instanceof PostEntity
            ? $current
            : throw new OutOfBoundsException('Failed getting current PostEntity');
    }

    public function valid(): bool
    {
        return \key($this->postEntities) !== null;
    }

    public function rewind(): void
    {
        \reset($this->postEntities);
    }

    public function count(): int
    {
        return \count($this->postEntities);
    }
}
