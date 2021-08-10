<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\PostCollection;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\CategoryEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\PostEntity;
use Book\Part3\Chapter8\ToyMVC\Model\Entity\Uuid;

/**
 * This class is purely for demo purposes.
 * This provides the data that would normally be retrieved from an ORM,
 * database or other persistence layer.
 */
final class FakeDataForToy
{
    private static self $instance;

    private Uuid $cat1Id;
    private Uuid $cat2Id;
    /** @var CategoryEntity[] */
    private array $categoryEntities;

    private function __construct()
    {
        $this->cat1Id           = Uuid::create();
        $this->cat2Id           = Uuid::create();
        $this->categoryEntities = [
            new CategoryEntity(
                $this->cat1Id,
                'Category 1',
                new PostCollection(
                    new PostEntity(
                        Uuid::create(),
                        'Post 1',
                        <<<'HTML'
                            You better eat a reality sandwich before you walk back in that boardroom feature creep you must be muted yet take five, punch the tree, and come back in here with a clear head. Looks great, can we try it a different way. Due diligence obviously big boy pants. Rock Star/Ninja cross sabers pulling teeth. 
                            HTML
                    ),
                    new PostEntity(
                        Uuid::create(),
                        'Post 2',
                        <<<'HTML'
                            Optimize for search form without content style without meaning. Low hanging fruit that is a good problem to have if you want to motivate these clowns, try less carrot and more stick, and we need to crystallize a plan pig in a python. Those options are already baked in with this model. Staff engagement great plan!
                            HTML
                    ),
                )
            ),
            new CategoryEntity(
                $this->cat2Id,
                'Category 2',
                new PostCollection(
                    new PostEntity(
                        Uuid::create(),
                        'Post 3',
                        <<<'HTML'
                            let me diarize this, and we can synchronise ourselves at a later timepoint are we in agreeance pig in a python window-licker, nor can you ballpark the cost per unit for me. Dog and pony show. Great plan! let me diarize this,
                            HTML
                    ),
                    new PostEntity(
                        Uuid::create(),
                        'Post 4',
                        <<<'HTML'
                            Can we jump on a zoom race without a finish line vertical integration, yet out of scope we need to crystallize a plan turn the crank.
                            HTML
                    ),
                )
            ),
        ];
    }

    public static function singleton(): self
    {
        return self::$instance ??= new self();
    }

    public function getCat1Id(): Uuid
    {
        return $this->cat1Id;
    }

    public function getCat2Id(): Uuid
    {
        return $this->cat2Id;
    }

    /** @return CategoryEntity[] */
    public function getCategoryEntities(): array
    {
        return $this->categoryEntities;
    }

    /** @return PostEntity[] */
    public function getPostEntities(): array
    {
        $postsToMerge = [];
        foreach ($this->categoryEntities as $categoryEntity) {
            $postsToMerge[] =
                \iterator_to_array($categoryEntity->getPostCollection());
        }

        return \array_merge(...$postsToMerge);
    }
}
