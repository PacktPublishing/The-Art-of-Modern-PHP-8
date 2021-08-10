<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\CoContra;

final class InvalidClass extends ParentClass implements ScalarInterface
{
    /**
     * Invalid - have tried to make the param tighter by moving it down the
     * hierarchical chain and also invalid as we have tried to make the
     * return type wider by moving it up the hierarchical chain.
     */
    public function getSomething(ChildInterface $thing): GrandParentInterface
    {
        return $thing;
    }

    /**
     * Invalid - have tried to make the param tighter by removing int as an
     * allowed type and also invalid as we have now tried to widen the return
     * types by adding int as an allowed return type.
     */
    public function doSomething(string $foo): string | int
    {
    }
}
