<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Model\Collection;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\PostRepository;
use PHPUnit\Framework\TestCase;

/**
 * @small
 *
 * @internal
 * @covers \Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection
 */
final class PostCollectionTest extends TestCase
{
    private const EXPECTED_COUNT = 4;
    private PostCollection $collection;

    public function setUp(): void
    {
        parent::setUp();
        $this->collection = (new PostRepository())->loadAll();
    }

    /** @test */
    public function itCanIterate(): void
    {
        $n = 0;
        foreach ($this->collection as $item) {
            self::assertInstanceOf(PostEntity::class, $item);
            ++$n;
        }
        self::assertSame(self::EXPECTED_COUNT, $n);
    }

    /** @test */
    public function itCanRewind(): void
    {
        $n = 0;
        foreach ($this->collection as $item) {
            self::assertInstanceOf(PostEntity::class, $item);
            ++$n;
        }
        $this->collection->rewind();
        foreach ($this->collection as $item) {
            self::assertInstanceOf(PostEntity::class, $item);
            ++$n;
        }
        self::assertSame(self::EXPECTED_COUNT * 2, $n);
    }

    /** @test */
    public function itCanWhileAndGetKey(): void
    {
        $keys = [];
        while ($this->collection->valid()) {
            $key = $this->collection->key();
            self::assertNotContains($key, $keys);
            $keys[] = $key;
            $this->collection->next();
        }
    }

    /** @test */
    public function itCanForeachKey(): void
    {
        $keys = [];
        foreach ($this->collection as $key => $value) {
            self::assertNotContains($key, $keys);
            $keys[] = $key;
            self::assertSame($key, (string)$value->getUuid());
        }
    }
}
