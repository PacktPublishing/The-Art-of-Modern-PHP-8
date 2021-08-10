<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Model;

use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;
use PHPUnit\Framework\TestCase;

/**
 * @small
 *
 * @internal
 * @covers \Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid
 */
final class UuidTest extends TestCase
{
    private const TEST_ITERATION_CNT = 100;

    /** @test */
    public function itGeneratesAndValidatesUuids(): void
    {
        for ($x = 0; $x <= self::TEST_ITERATION_CNT; ++$x) {
            $uuid = Uuid::create();
            self::assertNotEmpty((string)$uuid);
        }
    }

    /** @test */
    public function itMatches(): void
    {
        $uuid1 = Uuid::create();
        $uuid2 = new Uuid((string)$uuid1);
        self::assertTrue($uuid1->matches($uuid2));
        $uuid3 = Uuid::create();
        self::assertFalse($uuid1->matches($uuid3));
    }
}
