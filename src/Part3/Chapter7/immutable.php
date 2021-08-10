<?php

declare(strict_types=1);

namespace Book\Part3\Chapter7;

use DateInterval;
use DateTime;
use DateTimeImmutable;

$start     = new DateTime('2020-02-23 09:16:00');
$oneMinute = new DateInterval('PT1H');
$end       = $start->add($oneMinute);

echo "Mutable started at {$start->format('H:i:s')} "
     . "\nand ended at {$end->format('H:i:s')}"
     . "\na difference of " . $start->diff($end)->format('%h hours');

$start     = new DateTimeImmutable('2020-02-23 09:16:00');
$oneMinute = new DateInterval('PT1H');
$end       = $start->add($oneMinute);

echo "\n\nImmutable started at {$start->format('H:i:s')} "
     . "\nand ended at {$end->format('H:i:s')}"
     . "\na difference of " . $start->diff($end)->format('%h hours');
