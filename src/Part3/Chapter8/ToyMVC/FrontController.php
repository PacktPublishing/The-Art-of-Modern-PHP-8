<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC;

use Book\Part3\Chapter8\ToyMVC\Controller\ControllerInterface;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Factory\ControllerFactory;
use Book\Part3\Chapter8\ToyMVC\Controller\Factory\RequestDataFactory;

final class FrontController
{
    public function __construct(
        private ControllerFactory $controllerFactory,
        private RequestDataFactory $requestDataFactory
    ) {
    }

    public function handleRequest(): void
    {
        $requestData = $this->requestDataFactory::createFromGlobals();
        $this->createController($requestData)
            ->getResponse($requestData)
            ->send()
        ;
    }

    private function createController(
        RequestData $requestData
    ): ControllerInterface {
        return $this->controllerFactory->createControllerForRequest($requestData);
    }
}
