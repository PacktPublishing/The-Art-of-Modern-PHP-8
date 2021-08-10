<?php

declare(strict_types=1);

namespace YourName\HelloWorld;

interface OutputInterface
{
    public function sendOutput(MessageProviderInterface $messageProvider): void;
}