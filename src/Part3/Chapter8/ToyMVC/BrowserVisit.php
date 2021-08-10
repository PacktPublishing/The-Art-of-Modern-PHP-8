<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8\ToyMVC;

/**
 * This class lets us very simply simulate a browser visiting our toy MVC app.
 */
final class BrowserVisit
{
    private FrontController $frontController;

    public function __construct()
    {
        $this->frontController = AppFactory::createFrontController();
    }

    public function visit(string $uri): string
    {
        $this->setSuperGlobals($uri);
        \ob_start();

        $this->frontController->handleRequest();

        return (string)\ob_get_clean();
    }

    private function setSuperGlobals(string $uri): void
    {
        $_SERVER['REQUEST_URI']    = $uri;
        $_SERVER['REQUEST_METHOD'] = 'GET';
    }
}
