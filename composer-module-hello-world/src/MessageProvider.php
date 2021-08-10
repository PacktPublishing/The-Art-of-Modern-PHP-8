<?php

declare(strict_types=1);

namespace YourName\HelloWorld;

final class MessageProvider implements MessageProviderInterface
{
    public function __construct(private Language $language)
    {
    }

    public function getMessage(): string
    {
        return match ($this->language->getLanguageCode()) {
            Language::LANG_ENGLISH => 'Hello World',
            Language::LANG_AMERICAN => 'Howdy World',
            Language::LANG_IRISH => 'Top o\'the morning World',
            Language::LANG_AUSTRALIAN => 'G\'Day World',
            default => throw new \InvalidArgumentException('Unsupported language code ' .
                                                           $this->language->getLanguageCode())
        };
    }
}