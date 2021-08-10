<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestMethod;
use Book\Part3\Chapter8\ToyMVC\Controller\PostPageController;
use Book\Part3\Chapter8\ToyMVC\FakeDataForToy;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Repository\PostRepository;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;
use PHPUnit\Framework\TestCase;
use RuntimeException;

/**
 * @small
 * @covers \Book\Part3\Chapter8\ToyMVC\Controller\CategoryPageController
 *
 * @internal
 */
final class PostPageControllerTest extends TestCase
{
    private PostEntity $postEntity;
    private PostPageController $controller;

    public function setUp(): void
    {
        $postEntity = \current(FakeDataForToy::singleton()->getPostEntities());
        if ($postEntity === false) {
            throw new RuntimeException('failed getting post entity');
        }
        $this->postEntity = $postEntity;
        $this->controller = new PostPageController(new PostRepository(), new TemplateRenderer());
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
        $postIdString = (string)$this->postEntity->getUuid();

        return '/p/' . $postIdString;
    }
}
