<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\Controller;

use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestData;
use Book\Part3\Chapter8\ToyMVC\Controller\Data\RequestMethod;
use Book\Part3\Chapter8\ToyMVC\Controller\HomePageController;
use Book\Part3\Chapter8\ToyMVC\Model\Collection\CategoryCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\CategoryEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;
use PHPUnit\Framework\TestCase;

/**
 * @small
 * @covers \Book\Part3\Chapter8\ToyMVC\Controller\HomePageController
 *
 * @internal
 */
final class HomePageControllerTest extends TestCase
{
    private HomePageController              $controller;
    private Uuid                            $uuid;
    private CategoryRepositoryStubInterface $repoStub;

    public function setUp(): void
    {
        $this->repoStub   = $this->getCategoryRepositoryStub();
        $this->controller = new HomePageController($this->repoStub, new TemplateRenderer());
    }

    /** @test */
    public function itLoadsTheHomePage(): void
    {
        $response = $this->controller
            ->getResponse(
                new RequestData(
                    '/',
                    new RequestMethod(RequestMethod::METHOD_GET)
                )
            )
        ;
        \ob_start();
        $response->send();
        $actual = (string)\ob_get_clean();
        self::assertStringContainsString($this->repoStub->getCategoryName(), $actual);
        $this->repoStub->getPostCollection()->rewind();
        $postEntity = $this->repoStub->getPostCollection()->current();
        self::assertStringContainsString((string)$postEntity->getUuid(), $actual);
        self::assertStringContainsString($postEntity->getTitle(), $actual);
    }

    private function getPostCollection(): PostCollection
    {
        return new PostCollection(new PostEntity(Uuid::create(), 'BarTitle', '<b>Bar</b>'));
    }

    /**
     * This is a stub version of the repository that will return known test data.
     */
    private function getCategoryRepositoryStub(): CategoryRepositoryStubInterface
    {
        return new class(Uuid::create(), 'FootCategory', $this->getPostCollection()) implements CategoryRepositoryStubInterface {
            public function __construct(
                public Uuid $uuid,
                public string $name,
                public PostCollection $postCollection
            ) {
            }

            public function loadAll(): CategoryCollection
            {
                return new CategoryCollection($this->load($this->uuid));
            }

            public function load(Uuid $uuid): CategoryEntity
            {
                return new CategoryEntity($this->uuid, $this->name, $this->postCollection);
            }

            public function getUuid(): Uuid
            {
                return $this->uuid;
            }

            public function getCategoryName(): string
            {
                return $this->name;
            }

            public function getPostCollection(): PostCollection
            {
                return $this->postCollection;
            }
        };
    }
}
