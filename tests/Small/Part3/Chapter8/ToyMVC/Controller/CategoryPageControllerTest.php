<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Controller\CategoryPageController;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestMethod;
use Book\Part3\Chapter8\ToyMVC\FakeDataForToy;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\CategoryEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\CategoryRepository;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;
use PHPUnit\Framework\TestCase;

/**
 * @small
 * @covers \Book\Part3\Chapter8\ToyMVC\Controller\CategoryPageController
 *
 * @internal
 */
final class CategoryPageControllerTest extends TestCase
{
    private CategoryPageController $controller;
    private CategoryEntity $categoryEntity;

    public function setUp(): void
    {
        $this->categoryEntity = FakeDataForToy::singleton()->getCategoryEntities()[0];
        $this->controller     = new CategoryPageController(new CategoryRepository(), new TemplateRenderer());
    }

    /** @test */
    public function itLoadsThePage(): void
    {
        $uri         = $this->getUri();
        $requestData = new RequestData($uri, new RequestMethod(RequestMethod::METHOD_GET));
        $response    = $this->controller->getResponse($requestData);
        \ob_start();
        $response->send();
        $actual = (string)\ob_get_clean();
        self::assertStringContainsString('</html>', $actual);
    }

    private function getUri(): string
    {
        $catIdString = (string)$this->categoryEntity->getUuid();

        return '/c/' . $catIdString;
    }
}
