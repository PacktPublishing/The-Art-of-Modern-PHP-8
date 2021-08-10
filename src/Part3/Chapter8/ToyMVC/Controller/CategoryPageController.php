<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestMethod;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\Response;
use Book\Part3\Chapter8\ToyMVC\Meta\Route;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\CategoryRepository;
use Book\Part3\Chapter8\ToyMVC\View\Data\CategoryPageData;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;

/** Note use of consts instead of magic strings for attribute params */
#[Route(CategoryPageController::ROUTE_REGEX, RequestMethod::METHOD_GET)]
final class CategoryPageController implements ControllerInterface
{
    public const ROUTE_REGEX = '%^/c/(?<' .
                               Uuid::ROUTE_MATCH_KEY .
                               '>' .
                               Uuid::REGEXP_FRAGMENT .
                               ')$%m';

    public const TEMPLATE_NAME = 'CategoryPageTemplate.php';

    public function __construct(
        private CategoryRepository $categoryRepository,
        private TemplateRenderer $templateRenderer
    ) {
    }

    public function getResponse(RequestData $requestData): Response
    {
        $uuid           =
            Uuid::createFromUri($requestData->getUri(), self::ROUTE_REGEX);
        $categoryEntity = $this->categoryRepository->load($uuid);
        $templateData   = new CategoryPageData($categoryEntity);
        $pageContent    =
            $this->templateRenderer->renderTemplate(
                self::TEMPLATE_NAME,
                $templateData
            );

        return new Response($pageContent);
    }
}
