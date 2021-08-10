<?php

declare(strict_types=1);

namespace Book\Part3\Chapter7;

$fluentClass = new class() {
    public function doSomething(): static
    {
        // do something
        return $this;
    }

    public function doSomethingElse(): static
    {
        //do something else
        return $this;
    }
};

//fluent usage
$fluentClass->doSomething()
    ->doSomethingElse()
    ->doSomething()
    ->doSomethingElse()
;
