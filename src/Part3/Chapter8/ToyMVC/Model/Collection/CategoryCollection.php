<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Collection;

use Book\Part3\Chapter8\ToyMVC\Model\Entity\CategoryEntity;
use Countable;
use Iterator;
use OutOfBoundsException;

/**
 * @implements Iterator<string, CategoryEntity>
 */
final class CategoryCollection implements Iterator, Countable
{
    /** @var CategoryEntity[] */
    private array $categoryEntities;

    public function __construct(CategoryEntity ...$categoryEntities)
    {
        $this->categoryEntities = $categoryEntities;
        $this->rewind();
    }

    public function next(): bool | CategoryEntity
    {
        return \next($this->categoryEntities);
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

    public function current(): CategoryEntity
    {
        $current = \current($this->categoryEntities);

        return $current instanceof CategoryEntity
            ? $current
            :
            throw new OutOfBoundsException('Failed getting current CategoryEntity');
    }

    public function valid(): bool
    {
        return \key($this->categoryEntities) !== null;
    }

    public function rewind(): void
    {
        \reset($this->categoryEntities);
    }

    public function count(): int
    {
        return \count($this->categoryEntities);
    }
}
