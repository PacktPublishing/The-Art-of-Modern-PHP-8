<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5\NewInstance;

use RuntimeException;

final class Sleeper
{
    private string $foo = 'bar';
    private int $boo    = 123;
    /** @var resource */
    private $fp;

    public function __construct()
    {
        $this->openResource();
    }

    /**
     * Handle any cleanup tasks before going down for serialisation,
     * then return the data need to actually store in serialised form.
     *
     * @return array<int, mixed>
     */
    public function __serialize(): array
    {
        echo "\nI am going to sleep";

        //deliberately excluding our resource as it can not be serialised
        return [$this->foo, $this->boo];
    }

    /**
     * Handle setting the data of our new instance by unpacking the
     * serialised data array and assigning it as required. Any resources can
     * be reestablished as required.
     *
     * @param array<int, mixed> $data
     */
    public function __unserialize(array $data): void
    {
        echo "\nI have awoken!";
        [$this->foo, $this->boo] = $data;
        //reconnecting to our resource
        $this->openResource();
    }

    private function openResource(): void
    {
        $fp = \fopen(__FILE__, 'rb');
        if ($fp === false) {
            throw new RuntimeException('Failed opening file');
        }
        $this->fp = $fp;
    }
}
