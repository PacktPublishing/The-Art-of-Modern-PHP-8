<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC;

use Book\Part3\Chapter8\ToyMVC\Controller\Factory\ControllerFactory;
use Book\Part3\Chapter8\ToyMVC\Controller\Factory\RequestDataFactory;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\CategoryRepository;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\PostRepository;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;

final class AppFactory
{
    public static function createFrontController(): FrontController
    {
        return new FrontController(
            new ControllerFactory(
                new CategoryRepository(),
                new PostRepository(),
                new TemplateRenderer()
            ),
            new RequestDataFactory()
        );
    }
}
