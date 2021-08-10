<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Model\Entity;

use InvalidArgumentException;
use RuntimeException;
use Stringable;

/**
 * This is a very simple UUID generator,
 * inspired by https://github.com/abmmhasan/UUID/blob/main/src/Uuid.php
 * This is not suggested for production code!
 */
final class Uuid implements Stringable
{
    public const ROUTE_MATCH_KEY  = 'uuid';
    public const REGEXP_FRAGMENT  = '[0-9a-f]{8}(?:-[0-9a-f]{4}){3}-[0-9a-f]{12}';
    private const VERSION         = 4;

    public function __construct(private string $uuid)
    {
        if ($this->isValid($this->uuid) === false) {
            throw new InvalidArgumentException('Invalid UUID ' . $this->uuid);
        }
    }

    public function __toString(): string
    {
        return $this->uuid;
    }

    public static function create(): self
    {
        $hex    = \bin2hex(\random_bytes(16));
        $chunks = \str_split($hex, 4);

        $uuidString = \sprintf(
            '%08s-%04s-' . self::VERSION . '%03s-%04x-%012s',
            $chunks[0] . $chunks[1],
            $chunks[2],
            \substr($chunks[3], 1, 3),
            \hexdec($chunks[4]) & 0x3fff | 0x8000,
            $chunks[5] . $chunks[6] . $chunks[7]
        );

        return new self($uuidString);
    }

    public static function createFromUri(string $uri, string $pattern): self
    {
        if (\preg_match($pattern, $uri, $matchGroups) !== 1) {
            throw new RuntimeException('Failed matching uri ' .
                                       $uri .
                                       ' with pattern ' .
                                       $pattern);
        }
        $id = $matchGroups[self::ROUTE_MATCH_KEY]
              ??
              throw new RuntimeException('matchGroups does not include ' .
                                         self::ROUTE_MATCH_KEY);

        return new self($id);
    }

    public function matches(self $uuid): bool
    {
        return (string)$this === (string)$uuid;
    }

    private function isValid(string $uuid): bool
    {
        return \preg_match('%^' . self::REGEXP_FRAGMENT . '$%Di', $uuid) ===
               1;
    }
}
