<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestMethod;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\Response;
use Book\Part3\Chapter8\ToyMVC\Meta\Route;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\PostRepository;
use Book\Part3\Chapter8\ToyMVC\View\Data\PostPageData;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;

#[Route(PostPageController::ROUTE_REGEX, RequestMethod::METHOD_GET)]
final class PostPageController implements ControllerInterface
{
    public const ROUTE_REGEX = '%^/p/(?<' .
                               Uuid::ROUTE_MATCH_KEY .
                               '>' .
                               Uuid::REGEXP_FRAGMENT .
                               ')$%m';

    public const TEMPLATE_NAME = 'PostPageTemplate.php';

    public function __construct(
        private PostRepository $postRepository,
        private TemplateRenderer $templateRenderer
    ) {
    }

    public function getResponse(RequestData $requestData): Response
    {
        $uuid         =
            Uuid::createFromUri($requestData->getUri(), self::ROUTE_REGEX);
        $postEntity   = $this->postRepository->load($uuid);
        $templateData = new PostPageData($postEntity);
        $pageContent  =
            $this->templateRenderer->renderTemplate(
                self::TEMPLATE_NAME,
                $templateData
            );

        return new Response($pageContent);
    }
}
