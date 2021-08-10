<?php

declare(strict_types=1);

namespace YourName\HelloWorld\Cli;

use YourName\HelloWorld\Language;

class Args
{
    private const EQUALS   = '=';
    public const  ARG_LANG = 'lang';
    private string $languageCode = Language::LANG_ENGLISH;

    public function __construct(private array $argv)
    {
        if (PHP_SAPI !== 'cli') {
            throw new \RuntimeException('This class only works in command line PHP');
        }
        $this->parse();
    }

    private function parse(): void
    {
        foreach ($this->argv as $arg) {
            if (!str_contains($arg, self::EQUALS)) {
                continue;
            }
            [$argKey, $argVal] = explode(self::EQUALS, $arg);
            match ($argKey) {
                self::ARG_LANG => $this->languageCode = $argVal,
                default => throw new \InvalidArgumentException('Invalid argument ' . $argKey)
            };
        }
    }

    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }
}