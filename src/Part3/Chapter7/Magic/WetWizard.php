<?php

declare(strict_types=1);

namespace Book\Part3\Chapter7\Magic;

/**
 * The wet wizard is using magic strings and numbers directly within code. These values would need to be individually
 * hunted down and replaced should we ever need to refactor.
 */
final class WetWizard
{
    public function getCurrencySymbol(): string
    {
        // magic string
        return '£';
    }

    public function formatPrice(int | float $price): string
    {
        // magic number
        return \number_format(num: $price, decimals: 2);
    }

    public function getDisplayPrice(int | float $price): string
    {
        // magic string and magic number
        return '£' . \number_format(num: $price, decimals: 2);
    }

    public function isValidPrice(int | float $price): bool
    {
        // magic number
        return $price > 20;
    }

    public function ensureValidPrice(int | float $price): int | float
    {
        if ($this->isValidPrice($price)) {
            return $price;
        }

        // magic number
        return 20;
    }
}
