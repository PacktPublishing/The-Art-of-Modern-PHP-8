<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3\IteratorFun;

final class Config
{
    /** @var string[] */
    private array $subDirs;

    public function __construct(private string $baseDir, string ...$subDirs)
    {
        foreach ($subDirs as $subDir) {
            if (\str_starts_with(
                haystack: $subDir,
                needle: $this->baseDir
            ) === false) {
                $subDir = "{$this->baseDir}/{$subDir}";
            }
            $this->subDirs[] = $subDir;
        }
    }

    /** @return string[] */
    public function getSubDirs(): array
    {
        return $this->subDirs;
    }

    public function getBaseDir(): string
    {
        return $this->baseDir;
    }
}
