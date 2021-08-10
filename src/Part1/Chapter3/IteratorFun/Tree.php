<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3\IteratorFun;

use RecursiveDirectoryIterator;
use RecursiveTreeIterator;

final class Tree
{
    public function getAsciiTree(string $path): string
    {
        $return                = '';
        $recursiveTreeIterator = new RecursiveTreeIterator(
            new RecursiveDirectoryIterator(
                $path,
                RecursiveDirectoryIterator::SKIP_DOTS
            )
        );
        foreach ($recursiveTreeIterator as $line) {
            $return .= "\n" . $this->removePath($path, $line);
        }

        return $return;
    }

    private function removePath(string $pathToRemove, string $line): string
    {
        return \str_replace(
            search
            : $pathToRemove,
            replace
            : '',
            subject
            : $line
        );
    }
}
