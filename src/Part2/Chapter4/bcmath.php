<?php

declare(strict_types=1);

namespace Book\Part2\Chapter4;

echo "\n(0.7+0.1) = 0.8? "
     . ((\bccomp(
         \bcadd(num1: '0.7', num2: '0.1', scale: 1),
         num2: '0.8',
         scale: 1
     ) === 0) ? 'yes' : 'no');
