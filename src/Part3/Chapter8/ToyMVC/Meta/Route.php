<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\Meta;

use Attribute;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestMethod;

#[Attribute]
final class Route
{
    /** @var array<string, bool> */
    private array $methodNames;

    public function __construct(
        private string $routePattern,
        string ...$methodNames
    ) {
        foreach ($methodNames as $methodName) {
            RequestMethod::assertIsValidName($methodName);

            $this->methodNames[$methodName] = true;
        }
    }

    public function isMatch(RequestData $requestData): bool
    {
        return $this->matchesMethodName($requestData)
               && $this->matchesRoutePattern($requestData);
    }

    private function matchesMethodName(RequestData $requestData): bool
    {
        return isset($this->methodNames[$requestData->getMethod()
            ->getName()]);
    }

    private function matchesRoutePattern(RequestData $requestData): bool
    {
        return \preg_match($this->routePattern, $requestData->getUri()) === 1;
    }
}
