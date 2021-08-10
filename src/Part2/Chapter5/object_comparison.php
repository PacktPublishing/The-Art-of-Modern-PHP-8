<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5;

use stdClass;

// Create new instance
$instanceOne = new stdClass();

// Create another new instance
$instanceTwo = new stdClass();

// Create a reference to the first instance
$referenceOne = $instanceOne;

echo "\n" .
     '$instanceOne identical to $instanceTwo?  ' .
     \var_export($instanceOne === $instanceTwo, true) .
     "\n";

echo "\n" .
     '$instanceOne equal to $instanceTwo?      ' .
     \var_export($instanceOne == $instanceTwo, true) .
     "\n";

echo "\n" .
     '$instanceOne identical to $referenceOne? ' .
     \var_export($instanceOne === $referenceOne, true) .
     "\n";

$instanceOne->foo = 'bar';

echo "\n" .
     '$instanceOne with foo equal to $instanceTwo?      ' .
     \var_export($instanceOne == $instanceTwo, true) .
     "\n";
