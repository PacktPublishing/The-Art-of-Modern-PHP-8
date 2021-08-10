<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\TypeDeclarations;

/**
 * The modern class requires nearly no docblocks for type information,
 * everything it strongly defined in code apart from the contents of arrays
 * and other iterables. We still don't have generics so we have to docblock
 * that but we can at least get some type safety with the splat operator.
 */
final class ModernClass
{
    /** @var int[] */
    private array $anArray;

    public function __construct(
        private object $anObject,
        // notice union type, PHP 8 feature
        private int | float $aNumber,
        private string $aString,
        private bool $aBool = true,
        // choosing the type safety of splat over the convenience of constructor promotion and named parameters
        int ...$anArray
    ) {
        $this->anArray = $anArray;
    }

    /** @return int[] */
    public function getAnArray(): array
    {
        return $this->anArray;
    }

    public function getAnObject(): object
    {
        return $this->anObject;
    }

    public function getANumber(): int | float
    {
        return $this->aNumber;
    }

    public function getAString(): string
    {
        return $this->aString;
    }

    public function isABool(): bool
    {
        return $this->aBool;
    }
}
