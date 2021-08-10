<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

require __DIR__ . '/../../../vendor/autoload.php';

use Book\Part4\Chapter12\Enums\BackedEnum;
use Book\Part4\Chapter12\Enums\BasicEnum;

/** Create explicitly */
$basic  = BasicEnum::Bar;
$backed = BackedEnum::Taz;
echo "\nbasic is $basic->name and backed is $backed->name";

/** Create from a scalar value (eg a DB record) - only with backed enums */
$fromDb = BackedEnum::from('Baz');
echo "\nfrom DB is $fromDb->value";

/** Create from untrusted data, eg user input - only with backed enums */
// let's just imagine this is a user submitted form:
$_POST['BackedEnum'] = 'Baaaz';
// there's clearly a typo and it doesn't match, so it will use the default instead
$fromPost = BackedEnum::tryFrom($_POST['BackedEnum']) ?? BackedEnum::DEFAULT;
echo "\nfrom POST is $fromPost->value";

/** Call Methods */
echo "\nA random BasicEnum case is {$basic->getRandomCaseName()}";
echo "\nA random BackedEnum case is {$backed->getRandomCaseName()} and a random array is: " .
     print_r($backed->getRandomCaseAsArray(), true);