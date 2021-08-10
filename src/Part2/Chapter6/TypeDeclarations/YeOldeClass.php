<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\TypeDeclarations;

use stdClass;

/**
 * Ye Olde Fashioned Class
 * Way back when we had to use a whole boat load of comments and boilerplate
 * to define types. Unfortunately its about as defensively useful as a
 * chocolate teapot.
 */
final class YeOldeClass
{
    /** @var int[] */
    private $anArray;
    /** @var stdClass */
    private $anObject;
    /** @var float|int */
    private $aNumber;
    /** @var string */
    private $aString;
    /** @var bool */
    private $aBool;

    /**
     * @param int[]     $anArray
     * @param int|float $aNumber
     * @param string    $aString
     * @param bool      $aBool
     */
    public function __construct(
        array $anArray,
        stdClass $anObject,
        $aNumber,
        $aString,
        $aBool = true
    ) {
        $this->anArray  = $anArray;
        $this->anObject = $anObject;
        $this->aNumber  = $aNumber;
        $this->aString  = $aString;
        $this->aBool    = $aBool;
    }

    /** @return int[] */
    public function getAnArray()
    {
        return $this->anArray;
    }

    /** @return stdClass */
    public function getAnObject()
    {
        return $this->anObject;
    }

    /** @return int|float */
    public function getANumber()
    {
        return $this->aNumber;
    }

    /** @return string */
    public function getAString()
    {
        return $this->aString;
    }

    /** @return bool */
    public function isABool()
    {
        return $this->aBool;
    }
}
