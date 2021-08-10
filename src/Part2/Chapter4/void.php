<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

function returnsNull(): ?string
{
    return null;
}

function noReturn(): void
{
}

$void = returnsNull();

$noReturn = noReturn();

echo "\n\$void=" . \var_export($void, true);

echo "\n\$noReturn=" . \var_export($noReturn, true);

echo "\n\$void === \$noReturn? " . \var_export($void === $noReturn, true);
