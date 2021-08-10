<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\ReadOnly\ReadonlyMutableProperty;

require __DIR__ . '/../../../vendor/autoload.php';

$dto = new ReadonlyMutableProperty(\DateTime::createFromFormat(format: 'Y/m/d', datetime: '2021/08/02'));
echo "\nDate is currently: {$dto->dateTime->format('Y/m/d')}";

$dto->dateTime->setDate(2022, 1, 1);
echo "\nDate is now: {$dto->dateTime->format('Y/m/d')}";