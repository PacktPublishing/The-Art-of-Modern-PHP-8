<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

function info(mixed $resource): string
{
    $var   = \var_export($resource, true);
    $type  = \gettype($resource);
    $empty = \var_export(empty($resource), true);
    $isset = \var_export(isset($resource), true);

    return "\nVar: {$var}" .
           "\n Type: {$type} | Empty: {$empty} | Isset: {$isset}\n";
}

$file = \fopen(__FILE__, 'r');
echo info($file);

$curl = \curl_init();
echo info($curl);
