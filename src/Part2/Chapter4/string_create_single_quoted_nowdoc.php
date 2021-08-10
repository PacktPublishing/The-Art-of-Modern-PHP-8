<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

/**
 * Don't want to embed anything in the string.
 */
$singleQuoted =
    'This is a single quoted string. It can contain all kind of characters such as $"\n#, '
    . ';nothing will happen, the raw characters will just be included in your string.'
    . ' This makes it a very safe one to use. The main time it gets annoying, '
    . 'is when you want your string to contain \' characters, '
    . 'as then you have to remember to escape them with \\';
echo "\n{$singleQuoted}\n";

$nowDoc = <<<'DELIM'
    This is a a NOWDOC string. The definition looks more verbose than single quoted, and you have to type a few more characters. 
    What you get in return though is that you can include all ''' you want with no escaping.
    You can include all the $%"\n' special characters you want and they will just be included in the string as is
    DELIM;
echo "\n{$nowDoc}\n";
