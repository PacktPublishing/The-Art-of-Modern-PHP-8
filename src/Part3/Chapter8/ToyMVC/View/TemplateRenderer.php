<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\View;

use Book\Part3\Chapter8\ToyMVC\View\Data\TemplateDataInterface;
use RuntimeException;
use tidy;

final class TemplateRenderer
{
    /**
     * This method does the work of using the template to render some actual
     * HTML.
     *
     * The data variable is available to the template which is simple PHP
     * that is then required. The ob_ functions use output buffering to
     * capture the output of the template and then allow us ot return it as a
     * string
     */
    public function renderTemplate(
        string $templateName,
        TemplateDataInterface $templateData
    ): string {
        \ob_start();
        require __DIR__ . '/Template/' . \basename($templateName);

        $html = \ob_get_clean();
        if ($html === false) {
            throw new RuntimeException('failed getting output');
        }

        return $this->pretty($html);
    }

    /**
     * This method uses tidy to prettify the HTML from the template
     * You would not do this in production, purely doing here for the book.
     */
    private function pretty(string $html): string
    {
        $config = [
            'indent' => true,
            'wrap'   => 200,
        ];
        $tidy   = new tidy();
        $tidy->parseString($html, $config, 'utf8');
        $tidy->cleanRepair();

        return (string)$tidy;
    }
}
