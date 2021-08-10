<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Controller\Error;

use Book\Part3\Chapter8\ToyMVC\Controller\ControllerInterface;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\Response;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\ResponseHeader;
use Book\Part3\Chapter8\ToyMVC\View\Data\TemplateDataInterface;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;

final class NotFoundController implements ControllerInterface
{
    public const TEMPLATE_NAME = 'NotFoundPageTemplate.php';

    public function __construct(private TemplateRenderer $templateRenderer)
    {
    }

    public function getResponse(RequestData $requestData): Response
    {
        return new Response(
            responseBody: $this->getBody(),
            headers: new ResponseHeader('404 nothing found', 404)
        );
    }

    private function getBody(): string
    {
        return $this->templateRenderer->renderTemplate(
            templateName: self::TEMPLATE_NAME,
            templateData: $this->getEmptyData()
        );
    }

    private function getEmptyData(): TemplateDataInterface
    {
        return new class() implements TemplateDataInterface {
        };
    }
}
