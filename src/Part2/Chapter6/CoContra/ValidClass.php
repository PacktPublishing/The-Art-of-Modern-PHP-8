<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\CoContra;

final class ValidClass extends ParentClass implements ScalarInterface
{
    /**
     * Contravariant with ParentClass, param type moved up a notch on the
     * hierarchical chain.
     *
     * Covariant with ParentClass, return type moved down
     * a notch on the hierarchical chain.
     */
    public function getSomething(GrandParentInterface $thing): ChildInterface
    {
        return new class() implements ChildInterface {
        };
    }

    /**
     * Contravariant with Interface, types expanded to accept ints.
     *
     * Covariant with Interface, return type has been tightened and int has
     * been removed as an allowed type.
     */
    public function doSomething(string | int $foo): string
    {
        return (string)$foo;
    }
}
