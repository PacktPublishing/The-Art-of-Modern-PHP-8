<?php

declare(strict_types=1);

namespace Book\Part1\Chapter3;

try {
    echo "\nStarting process";
    echo "\nAbout to do something really silly...";
    $ohno = \substr([], 1);
} catch (\Throwable) {
    // do nothing,
    // leave no trace in debug logs,
    // no breadcrumbs for weary developer to find their way
    // literally no way to figure out what is going on than to read the code
    // or step through debug to figure out what is going on
}
echo "\nAnd continue, just assuming everything is fine...";
