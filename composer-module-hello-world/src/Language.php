<?php

declare(strict_types=1);

namespace YourName\HelloWorld;

class Language
{
    public const LANG_ENGLISH    = 'en-gb';
    public const LANG_AMERICAN   = 'en-us';
    public const LANG_AUSTRALIAN = 'en-au';
    public const LANG_IRISH      = 'en-ie';
    public const LANGUAGES       = [
        self::LANG_ENGLISH,
        self::LANG_AMERICAN,
        self::LANG_AUSTRALIAN,
        self::LANG_IRISH,
    ];

    public function __construct(private string $languageCode)
    {
        $this->validateLanguageCode();
    }

    private function validateLanguageCode(): void
    {
        in_array(needle: $this->languageCode, haystack: self::LANGUAGES, strict: true)
            ?: throw new \InvalidArgumentException('Invalid language code ' . $this->languageCode);
    }

    public function getLanguageCode(): string
    {
        return $this->languageCode;
    }
}