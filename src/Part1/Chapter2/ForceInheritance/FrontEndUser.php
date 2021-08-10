<?php

declare(strict_types=1);

namespace Book\Part1\Chapter2\ForceInheritance;

/**
 * Class CAN be instantiated, CANNOT be inherited from.
 */
final class FrontEndUser extends AbstractUser
{
    /** @var string[] */
    private array $recentlyViewedPages;

    public function __construct(
        protected int $id,
        protected string $name,
        string ...$recentlyViewedPages
    ) {
        parent::__construct($id, $name);
        $this->recentlyViewedPages = $recentlyViewedPages;
    }

    public function __toString(): string
    {
        $viewed = \print_r($this->recentlyViewedPages, true);

        return <<<STRING
            front end user {$this->name} ({$this->id}) has recently viewed:
            {$viewed}
            STRING;
    }
}
