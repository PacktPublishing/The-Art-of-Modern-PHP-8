<?php

declare(strict_types=1);

namespace Book\Part3\Chapter9\ToyDI;

use Exception;
use Psr\Container\NotFoundExceptionInterface;

final class NotFoundException extends Exception implements NotFoundExceptionInterface
{
}
