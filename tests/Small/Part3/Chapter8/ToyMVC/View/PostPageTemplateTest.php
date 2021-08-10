<?php

declare(strict_types=1);

namespace Book\Tests\Small\Part3\Chapter8\ToyMVC\View;

use Book\Part3\Chapter8\ToyMVC\Model\Repository\PostRepository;
use Book\Part3\Chapter8\ToyMVC\View\Data\PostPageData;
use Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer;
use PHPUnit\Framework\TestCase;

/**
 * @small
 * @covers \Book\Part3\Chapter8\ToyMVC\View\Data\PostPageData
 * @covers \Book\Part3\Chapter8\ToyMVC\View\TemplateRenderer
 *
 * @internal
 */
final class PostPageTemplateTest extends TestCase
{
    public const TEMPLATE_NAME = 'PostPageTemplate.php';

    public const MATCHES_FORMAT = <<<'HTML'
        <!DOCTYPE html>
        <html>
          <head>
            <title>
              Post Post 1
            </title>
          </head>
          <body>
            <h1>
              Post 1
            </h1>You better eat a reality sandwich before you walk back in that boardroom feature creep you must be muted yet take five, punch the tree, and come back in here with a clear head. Looks great,
            can we try it a different way. Due diligence obviously big boy pants. Rock Star/Ninja cross sabers pulling teeth.
          </body>
        </html>
        HTML;

    /** @test */
    public function itRendersTheHomePage(): void
    {
        $collection  = (new PostRepository())->loadAll();
        $data        = new PostPageData($collection->current());
        $pageContent = (new TemplateRenderer())->renderTemplate(self::TEMPLATE_NAME, $data);
        self::assertStringMatchesFormat(self::MATCHES_FORMAT, $pageContent);
    }
}
