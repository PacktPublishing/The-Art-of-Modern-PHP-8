<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\Response;

interface ControllerInterface
{
    public function getResponse(RequestData $requestData): Response;
}
