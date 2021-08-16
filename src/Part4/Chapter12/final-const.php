<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12;

use Book\Part4\Chapter12\FinalConst\ChildClass;
use Book\Part4\Chapter12\FinalConst\ConstInterface;
use Book\Part4\Chapter12\FinalConst\ParentClass;

require __DIR__ . '/../../../vendor/autoload.php';

/**
 * Constants are accessible down the inheritance chain like any other class property. The visibility is controlled with
 * standard private/protected/public controls. We can make it final at any level in the chain
 */
echo sprintf('
interfaceFoo = %s
parentFoo    = %s
childFoo     = %s

',
             ConstInterface::FOO,
             ParentClass::FOO,
             ChildClass::FOO);
/**
 * Constants can be overridden at every step of the inheritance chain, unless marked as final
 */
echo sprintf('
interfaceThing = %s
parentThing    = %s
childThing     = %s

',
             ConstInterface::THING,
             ParentClass::THING,
             ChildClass::THING);

/**
 * We can see the difference between the self and static versions of these with this code:
 */
echo sprintf('
ChildClass::getSelfFoo = %s
ChildClass::getStaticFoo = %s

',
             ChildClass::getSelfThing(),
             ChildClass::getStaticThing()
);

/**
 * Trying to override a final const is a fatal error
 */
class OhNoYouDont extends ParentClass
{
    public const FOO = 'this wont work';
}

