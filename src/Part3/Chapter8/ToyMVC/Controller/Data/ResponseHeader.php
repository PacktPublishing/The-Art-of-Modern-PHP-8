<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Controller\Data;

final class ResponseHeader
{
    public function __construct(private string $header, private int $code)
    {
    }

    public function send(): void
    {
        if (\headers_sent()) {
            return;
        }
        \header($this->header, true, $this->code);
    }
}
