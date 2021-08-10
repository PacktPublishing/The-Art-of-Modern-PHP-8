<?php

declare(strict_types=1);

namespace YourName\HelloWorld\Cli;

use YourName\HelloWorld\MessageProviderInterface;
use YourName\HelloWorld\OutputInterface;

class CliOutput implements OutputInterface
{
    public function __construct()
    {
        if (PHP_SAPI !== 'cli') {
            throw new \RuntimeException('This output mechanism should only be used on the CLI');
        }
    }

    public function sendOutput(MessageProviderInterface $messageProvider): void
    {
        fwrite(STDOUT, "\n" . $this->getMessage($messageProvider));
    }

    private function getMessage(MessageProviderInterface $messageProvider): string
    {
        $message       = $messageProvider->getMessage();
        $messageLength = strlen($message);
        $topLine       = ' /￣' . str_repeat('￣', $messageLength + 2) . '\\';
        $bottomLine    = ' \\＿' . str_repeat('＿', $messageLength + 2) . '/';
        $messageLine   = '<  ' . $message . '  ';

        return "\n\n$topLine\n$messageLine\n$bottomLine\n\n";
    }
}