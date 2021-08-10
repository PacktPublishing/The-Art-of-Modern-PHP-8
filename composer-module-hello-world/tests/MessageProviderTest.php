<?php

declare(strict_types=1);

namespace YourName\HelloWorld\Tests;

use Generator;
use PHPUnit\Framework\TestCase;
use YourName\HelloWorld\Language;
use YourName\HelloWorld\MessageProvider;

class MessageProviderTest extends TestCase
{
    /**
     * @dataProvider
     * @return Generator<Language>
     */
    public function provideLanguage(): Generator
    {
        foreach (Language::LANGUAGES as $languageCode) {
            yield $languageCode => [new Language($languageCode)];
        }
    }

    /**
     * @test
     * @dataProvider provideLanguage
     */
    public function itCanProvideEnglishMessages(Language $language): void
    {
        $actual = (new MessageProvider($language))->getMessage();
        self::assertNotEmpty($actual);
    }
}