<?php

declare(strict_types=1);

namespace YourName\HelloWorld\Tests;

use PHPUnit\Framework\TestCase;
use YourName\HelloWorld\Language;

class LanguageTest extends TestCase
{
    /** @test */
    public function itCanBeCreatedWithValidLanguage(): void
    {
        $expected = Language::LANG_ENGLISH;
        $actual   = (new Language(Language::LANG_ENGLISH))->getLanguageCode();
        self::assertSame($expected, $actual);
    }

    /** @test */
    public function itExceptsOnInvalidLanguage(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Invalid language en-php');
        new Language('en-php');
    }
}