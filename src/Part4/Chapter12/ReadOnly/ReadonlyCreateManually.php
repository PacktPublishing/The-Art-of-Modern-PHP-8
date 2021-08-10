<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\ReadOnly;

class ReadonlyCreateManually
{
    private readonly mixed $expensiveThing;

    public function __construct(
        public readonly int $foo,
        public readonly string $bar,
        public readonly \stdClass $object,
        mixed $expensiveThing = null
    )
    {
        $this->expensiveThing = $expensiveThing ?? $this->createExpensiveThing();
    }

    private function createExpensiveThing(): mixed
    {
        // imagine something that takes a long time or lots of resources to create
        return 'that was hard work - created at ' . time();
    }

    /**
     * This is our immutable new instance creation method.
     *
     * All constructor params are replicated but are all optional with null default.
     *
     * If any parameter is desired to be overridden it can be passed in,
     * otherwise the current value will be assigned to the new instance.
     *
     * Note that object instances should be cloned for better immutability
     *
     * Combined with named parameters, this approach becomes a very ergonomic way
     * to create new instances with updated values
     */
    public function with(int $foo=null, string $bar=null, \stdClass $object=null): self
    {
        return new self(
            foo: $foo ?? $this->foo,
            bar: $bar ?? $this->bar,
            object: clone ($object ?? $this->object),
            expensiveThing: $this->expensiveThing
        );
    }
}