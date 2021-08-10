<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC\View\Data;

use Book\Part3\Chapter8\ToyMVC\Model\Collection\CategoryCollection;

final class HomePageData implements TemplateDataInterface
{
    public function __construct(
        private CategoryCollection $categoryCollection
    ) {
    }

    public function getCategoryCollection(): CategoryCollection
    {
        return $this->categoryCollection;
    }
}
