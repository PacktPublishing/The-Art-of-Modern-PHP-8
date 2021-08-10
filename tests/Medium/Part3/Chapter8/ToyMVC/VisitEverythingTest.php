<?php

declare(strict_types=1);

namespace Book\Tests\Medium\Part3\Chapter8\ToyMVC;

use Book\Part3\Chapter8\ToyMVC\BrowserVisit;
use PHPUnit\Framework\TestCase;

/**
 * @medium
 * @coversNothing
 *
 * @internal
 */
final class VisitEverythingTest extends TestCase
{
    private const EXPECTED_VISITS = 8;
    private int $visits;
    private BrowserVisit $browserVisit;

    public function setUp(): void
    {
        parent::setUp();
        $this->browserVisit = new BrowserVisit();
        $this->visits       = 0;
    }

    /** @test */
    public function itCanVisitAllPages(): void
    {
        $homePage = $this->visit('/');

        \preg_match_all('%href="(?<uri>[^"]+)"%', $homePage, $matches);

        foreach ($matches['uri'] as $uri) {
            $this->visit($uri);
        }
        $this->visit('not exists');
        self::assertSame(self::EXPECTED_VISITS, $this->visits);
    }

    private function assertLoaded(string $page): void
    {
        self::assertStringEndsWith('</html>', \trim($page));
    }

    private function visit(string $uri): string
    {
        $page = $this->browserVisit->visit($uri);
        $this->assertLoaded($page);
        ++$this->visits;

        return $page;
    }
}
