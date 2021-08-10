<?php

declare(strict_types=1);

namespace Book\Part3\Chapter8;

use Book\Part3\Chapter8\ToyMVC\BrowserVisit;

require __DIR__ . '/../../../vendor/autoload.php';

$homePage = (new BrowserVisit())->visit('/');

echo $homePage;
