<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part1\Chapter3;

use Book\Tests\Assets\OutputGetter;
use PHPUnit\Framework\TestCase;

/**
 * @small
 *
 * @internal
 * @coversNothing
 */
final class IteratorTest extends TestCase
{
    private const SCRIPT_PATH     = __DIR__ . '/../../../../src/Part1/Chapter3/iterator.php';
    private const EXPECTED_OUTPUT = <<<'REGEXP'
        %Filtered Blue Files:(\s+?/.+?blue_.+?$){3}%m
        REGEXP;

    /** @test */
    public function outputIsAsExpected(): void
    {
        $actual = OutputGetter::getOutput(self::SCRIPT_PATH);
        self::assertMatchesRegularExpression(self::EXPECTED_OUTPUT, $actual);
    }
}
