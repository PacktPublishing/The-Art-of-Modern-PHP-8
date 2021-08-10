<?php

declare(strict_types=1);

namespace YourName\HelloWorld;

interface MessageProviderInterface
{
    /**
     * Get the hello world message in the configured Language
     */
    public function getMessage(): string;
}