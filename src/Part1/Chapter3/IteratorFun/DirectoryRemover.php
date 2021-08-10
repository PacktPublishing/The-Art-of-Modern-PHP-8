<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3\IteratorFun;

use FilesystemIterator;
use RuntimeException;
use SplFileInfo;

/**
 * Unfortunately PHP has no built in equivalent to rm -rf
 * We can't remove directories that have contents so we have to actually go
 * and remove all directory contents before we can remove the directory.
 *
 * This class will handle that recursively, and we're using an Iterator to
 * help, along with the SplFileInfo
 */
final class DirectoryRemover
{
    public function removeDir(string $path): void
    {
        if (!\is_dir($path)) {
            return;
        }
        $traversable = $this->getIterator($path);
        foreach ($traversable as $item) {
            if (false === ($item instanceof SplFileInfo)) {
                throw new RuntimeException(
                    message: 'Iterator badly configured, 
                    must be set to return SplFileInfo objects with CURRENT_AS_FILEINFO'
                );
            }
            if ($item->isDir()) {
                // at this point, we start to recurse
                $this->removeDir($item->getPathname());
                // then the directory is empty and we can remove it
                \rmdir($item->getPathname());
            }
            if ($item->isFile()) {
                \unlink($item->getPathname());
            }
        }
    }

    private function getIterator(string $path): FilesystemIterator
    {
        /**
         * The CURRENT_AS_FILEINFO informs the FileSystemIterator to give us SplFileInfo objects
         * instead of plain path strings.
         *
         * The SKIP_DOTS flag means that it skips the ./ and ../ items
         */
        $flags = FilesystemIterator::CURRENT_AS_FILEINFO | FilesystemIterator::SKIP_DOTS;

        /*
         * Creating a new anonymous class that extends the SPL FilesystemIterator
         * and allows us to include our trait
         */
        return new class(directory: $path, flags: $flags) extends FilesystemIterator {
            /*
             * We are overriding the FileSystemIterator and enforcing that current()
             * will always return the SplFileInfo
             * and for brevity this is using an anonymous class and a trait
             */
            use CurrentIsFileInfoTrait;
        };
    }
}
