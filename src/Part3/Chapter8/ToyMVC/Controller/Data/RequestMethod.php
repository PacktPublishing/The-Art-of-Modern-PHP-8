<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Controller\Data;

use InvalidArgumentException;

/**
 * Note: We're deliberately only handling the most basic HTTP verbs for the purposes of the Toy.
 * A real framework would handle other verbs such as PUT, DELETE and maybe others.
 */
final class RequestMethod
{
    public const METHOD_GET  = 'GET';
    public const METHOD_POST = 'POST';
    public const METHODS     = [
        self::METHOD_GET  => self::METHOD_GET,
        self::METHOD_POST => self::METHOD_POST,
    ];

    public function __construct(private string $name)
    {
        self::assertIsValidName($name);
        $this->name = \strtoupper($this->name);
    }

    public static function assertIsValidName(string $name): void
    {
        if (isset(self::METHODS[$name])) {
            return;
        }
        throw new InvalidArgumentException(
            'Invalid method ' . $name . ', must be one of: ' . \print_r(
                self::METHODS,
                true
            )
        );
    }

    public function getName(): string
    {
        return $this->name;
    }
}
