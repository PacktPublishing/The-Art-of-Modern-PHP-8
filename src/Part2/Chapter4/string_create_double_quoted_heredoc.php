<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

/**
 * Do want to embed things directly in the string.
 */
$thingToEmbed = ' [embed me pls] ';
$otherThing   = new class() {
    public function getStuff(): string
    {
        return ' (some stuff) ';
    }
};
$doubleQuoted = "
A double quoted string can include other variables directly such as {$thingToEmbed}.
You can also directly embed more complex things if you wrap it in curly braces, like this {$otherThing->getStuff()}
As with single quoted strings, you have to escape any \" characters you want to include. 
\nOne nice feature of this kind of string is that you can easily\n embed \n\t special\n\t\t characters
";
echo "\n{$doubleQuoted}\n";

$hereDoc = <<<DELIM
    A heredoc is exactly like the double quoted string, but comes with the benefit of " and ' being included with no hassle. 
    You can also embed things like {$thingToEmbed} and {$otherThing->getStuff()}.
    HEREDOC strings will also let you \n embed\n\t special\n\t\t characters.
    DELIM;
echo "\n{$hereDoc}\n";
