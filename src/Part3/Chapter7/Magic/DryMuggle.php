<?php

declare(strict_types=1);

namespace Book\Part3\Chapter7\Magic;

/**
 * The DRY Muggle class is magic free and is not repeating itself.
 */
final class DryMuggle
{
    /**
     * We define our values in only one single place, ideally in the whole codebase.
     * By using public constants we can provide safety, clarity, self documentation
     * and trivially easy refactoring should these values need to change.
     */
    public const CURRENCY_SYMBOL = '£';
    public const MIN_PRICE       = 20;
    public const NUM_DECIMALS    = 2;

    public function getCurrencySymbol(): string
    {
        return self::CURRENCY_SYMBOL;
    }

    public function formatPrice(int | float $price): string
    {
        return \number_format(num: $price, decimals: self::NUM_DECIMALS);
    }

    public function getDisplayPrice(int | float $price): string
    {
        return self::CURRENCY_SYMBOL . \number_format(num: $price, decimals: self::NUM_DECIMALS);
    }

    public function isValidPrice(int | float $price): bool
    {
        return $price > self::MIN_PRICE;
    }

    public function ensureValidPrice(int | float $price): int | float
    {
        if ($this->isValidPrice($price)) {
            return $price;
        }

        return self::MIN_PRICE;
    }
}
