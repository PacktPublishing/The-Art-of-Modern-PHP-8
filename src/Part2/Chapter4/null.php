<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

// assigning null as a value
$foo = null;

// short function syntax to return a null
$bar = (static fn (): ?string => null)();

// short function syntax to return a null using union type
$baz = (static fn (): string | null => null)();

echo "\n\$foo===\$bar? " . \var_export($foo === $bar, true);
echo "\n\$foo===\$baz? " . \var_export($foo === $baz, true);
