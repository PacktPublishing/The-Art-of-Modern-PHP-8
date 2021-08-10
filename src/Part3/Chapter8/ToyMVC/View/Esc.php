<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\View;

final class Esc
{
    public static function _(string $input): string
    {
        return \htmlspecialchars(string: $input, flags: ENT_QUOTES);
    }
}
