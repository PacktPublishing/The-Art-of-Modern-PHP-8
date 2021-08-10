<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3\IteratorFun;

use FilterIterator;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;

final class FilterBlueFiles
{
    public const FILTER_MATCH = 'blue';

    /** @return SplFileInfo[] */
    public function getFilteredFiles(Config $config): array
    {
        $filterIterator = $this->getIterator($config);

        /*
         * The iterator to array function effectively loops
         * through our iterator and provides the result as an array
         */
        return \iterator_to_array($filterIterator);
    }

    private function getIterator(Config $config): FilterIterator
    {
        $directoryIterator = new RecursiveDirectoryIterator(
            directory: $config->getBaseDir()
        );

        /*
         * Creating a new anonymous class that is inheriting from
         * the SPL FilterIterator abstract class
         */
        return new class(new RecursiveIteratorIterator($directoryIterator)) extends FilterIterator {
            /**
             * Implementing the abstract method in FilterIterator
             * with our custom logic to only accept blue files.
             */
            public function accept(): bool
            {
                $current = $this->current();
                if ($current->isDir()) {
                    return false;
                }

                return $this->isBlue(filename: $current->getBasename());
            }

            private function isBlue(string $filename): bool
            {
                return \str_contains(
                    haystack: $filename,
                    needle: FilterBlueFiles::FILTER_MATCH
                );
            }
        };
    }
}
