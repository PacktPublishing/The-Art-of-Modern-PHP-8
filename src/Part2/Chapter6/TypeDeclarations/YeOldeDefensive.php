<?php

declare(strict_types=1);

namespace Book\Part2\Chapter6\TypeDeclarations;

use RuntimeException;
use stdClass;

/**
 * Ye Olde Fashioned Defensive Class
 * The only way to be truly defensive was to build in lots of type checking
 * and enforcement.
 */
final class YeOldeDefensive
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
        $errors = [];
        if (false === (\is_int($aNumber) || \is_float($aNumber))) {
            $errors[] =
                'invalid $aNumber ' .
                $aNumber .
                ', must be an int or a float';
        }
        if (\is_string($aString) === false) {
            $errors[] = 'invalid $aString ' . $aString . ', must be a string';
        }
        if (\is_bool($aBool) === false) {
            $errors[] = 'invalid $aBool ' . $aBool . ', must be a bool';
        }
        if ($errors !== []) {
            throw new RuntimeException('Errors in constructor params: ' .
                                       \print_r($errors, true));
        }
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
