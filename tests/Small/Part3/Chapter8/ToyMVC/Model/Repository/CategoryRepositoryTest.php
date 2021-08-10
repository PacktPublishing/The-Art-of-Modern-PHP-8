<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Model\Repository;

use Book\Part3\Chapter8\ToyMVC\Model\Entity\CategoryEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\CategoryRepository;
use PHPUnit\Framework\TestCase;

/**
 * @small
 *
 * @internal
 * @covers \Book\Part3\Chapter8\ToyMVC\Model\Repository\CategoryRepository
 */
final class CategoryRepositoryTest extends TestCase
{
    private CategoryRepository $repo;

    public function setUp(): void
    {
        parent::setUp();
        $this->repo = new CategoryRepository();
    }

    /** @test */
    public function itCanLoadAllCategories(): void
    {
        $actual = $this->repo->loadAll();
        self::assertGreaterThan(0, $actual->count());
        foreach ($actual as $item) {
            self::assertInstanceOf(CategoryEntity::class, $item);
        }
    }
}
