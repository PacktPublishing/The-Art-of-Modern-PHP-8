<?php

declare(strict_types=1);

namespace Book\Part4\Chapter12\FinalConst;

class ParentClass implements ConstInterface
{
    /**
     * this would not be allowed in less than PHP 8.1 as interface constants were basically final,
     * however in 8.1 it is now allowed
     */
    public const THING = 'parent thing';
    /**
     * We're overriding the interface const and then making it final
     */
    final public const FOO = 'baz';

    /**
     * This will always return the value of ParentClass::FOO as the method is defined in ParentClass and it is
     * accessing the const using `self`
     */
    public static function getSelfThing(): string
    {
        return self::THING;
    }

    /**
     * This will return the value of FOO in the context of whichever class it was called from, thanks to late static
     * binding
     */
    public static function getStaticThing(): string
    {
        return static::THING;
    }

}