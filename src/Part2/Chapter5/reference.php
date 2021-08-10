<?php

declare(strict_types=1);

namespace Book\Part2\Chapter5;

//For non object variables, we have to use the & sign to declare references
$a = 1;
echo "\n\$a is {$a}";

// $b is a reference to $a
$b =&$a;

// by updating $b, we actually update $a
$b = 2;
echo "\nAnd now \$a is {$a}";

//A simple object that gives its object ID when we cast it to string
$instance = new class() {
    public function __toString(): string
    {
        return (string)\spl_object_id($this);
    }
};
echo "\n\$instance ID: {$instance}";

// Now creating a simple reference to that instance
// Note that we do not include a &, it is all automatic
$reference1 = $instance;
echo "\n\$reference1 ID: {$reference1}";

// Now creating a function and calling, passing in the instance
(static function (object $reference2): void {
    echo "\n\$reference2 ID: {$reference2}";
})($reference1);

// Finally, getting a new instance
$newInstance = clone $instance;
echo "\n\$newInstance ID: {$newInstance}\n";
