<?php

declare(strict_types=1);

namespace Book\Tests\Large;

use FilterIterator;
use Generator;
use PHPUnit\Framework\TestCase;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

/**
 * Quick and dirty run the code and make sure its not falling over.
 *
 * @large
 * @coversNothing
 *
 * @internal
 */
final class RunEverythingTest extends TestCase
{
    private const DISABLE_XDEBUG = ' unset XDEBUG_SESSION ';
    private const REDIRECT_ERR   = ' 2>&1 ';
    private const SUCCESS_CODE   = 0;
    private const FAILURE_CODE   = 255;
    private const EXPECT_EMPTY   = [
        'named_args.php'        => true,
        'string_functions.php'  => true,
        'inheritance.php'       => true,
        'interfaces.php'        => true,
        'fluent.php'            => true,
        'autoloadedBliss.php'   => true,
        'bespokeAutoloader.php' => true,
        'oldFashioned.php'      => true,
    ];
    private const EXPECT_FAILURE = [
        'uninitialised.php' => true,
    ];

    /** @dataProvider provideFilesToRun */
    public function testItRuns(SplFileInfo $file): void
    {
        $codeRealPath = (string)$file->getRealPath();
        $basename     = $file->getBasename();

        [$exitCode, $output] = $this->runCode($codeRealPath);

        $errorMessage = "Got Output:\n\n{$output}";

        isset(self::EXPECT_FAILURE[$basename])
            ? self::assertSame(self::FAILURE_CODE, $exitCode, $errorMessage)
            : self::assertSame(self::SUCCESS_CODE, $exitCode, $errorMessage);

        isset(self::EXPECT_EMPTY[$basename])
            ? self::assertSame('', $output)
            : self::assertNotEmpty($output, $output);
    }

    /**
     * @dataProvider
     *
     * @return array<string,mixed>
     */
    public function provideFilesToRun(): array
    {
        return \iterator_to_array($this->filesToRunIterator());
    }

    /**
     * @return array<mixed>
     */
    private function runCode(string $codeRealPath): array
    {
        \exec(
            command: self::DISABLE_XDEBUG . ' && php -f ' . $codeRealPath . self::REDIRECT_ERR,
            output: $output,
            result_code: $exitCode
        );
        $output = \trim(\implode("\n", $output));

        return [$exitCode, $output];
    }

    /**
     * @return Generator<string,mixed>
     */
    private function filesToRunIterator(): Generator
    {
        $iterator =
            new class(new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/../../src/'))) extends FilterIterator {
                private const ACCEPT_REGEXP = '%src/(?<part>[^/]+)/(?<chapter>[^/]+)/(?<file>[^/]+)\.php%';

                public function accept(): bool
                {
                    /** @var SplFileInfo $current */
                    $current = $this->current();
                    $path    = (string)$current->getRealPath();
                    if (\str_contains($path, '/vendor/')) {
                        return false;
                    }

                    return \preg_match(self::ACCEPT_REGEXP, $path) === 1;
                }
            };
        foreach ($iterator as $file) {
            /* @var SplFileInfo $file */
            yield $file->getBasename() => [$file];
        }
    }
}
