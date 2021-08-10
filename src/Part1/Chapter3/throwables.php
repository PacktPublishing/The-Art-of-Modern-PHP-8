<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3;

$tree = [];
foreach (\get_declared_classes() as $item) {
    $implements = \class_implements($item);
    if ($implements === false) {
        continue;
    }
    if (\array_key_exists(key: 'Throwable', array: $implements)) {
        $parent          = (string)\get_parent_class($item);
        $tree[$parent][] = $item;
    }
}
/** @param array<string, mixed> $tree */
function printTree(array $tree, string $parent = '', int $level = 0): void
{
    if (isset($tree[$parent]) === false) {
        return;
    }
    $leaves = $tree[$parent];
    \natcasesort($leaves);
    $pad    = \str_repeat('  ', $level);
    foreach ($leaves as $leaf) {
        echo "{$pad}  {$leaf}\n";
        printTree($tree, $leaf, $level + 1);
    }
}

printTree($tree);
