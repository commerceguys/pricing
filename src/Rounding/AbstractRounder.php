<?php

namespace CommerceGuys\Pricing\Rounding;

use CommerceGuys\Pricing\InvalidArgumentException;
use CommerceGuys\Pricing\Price;
use CommerceGuys\Pricing\PriceInterface;

abstract class AbstractRounder
{
    /**
     * @param PriceInterface $price
     * @param int|null       $precision
     *
     * @return Price
     */
    public static function round(PriceInterface $price, $precision = null)
    {
        $rounder = new static();

        return $rounder->roundPrice($price, $precision);
    }

    /**
     * @param PriceInterface $price
     * @param int|null       $precision
     *
     * @return Price
     */
    protected function roundPrice(PriceInterface $price, $precision = null)
    {
        if (is_null($precision)) {
            $precision = $price->getCurrency()->getFractionDigits();
        }

        if ($precision < 0) {
            throw new InvalidArgumentException('The provided precision should be a positive number');
        }

        // Ensure that the amount is positive, has a decimal point and the
        // needed number of digits.
        $negative = (bccomp('0', $price->getAmount(), 12) == 1);
        $signMultiplier = $negative ? '-1' : '1';
        $amount = bcdiv($price->getAmount(), $signMultiplier, $precision + 1);
        // The digit evaluated for rounding purposes is the one after the
        // precision digit (amount = 5.956, precision = 2, digit = 6).
        $amountParts = explode('.', $amount);
        $lastWholeDigit = substr($amountParts[0], -1);
        $digits = str_split($amountParts[1]);
        $digit = $digits[$precision];

        if ($digit == 0) {
            // No need to round, just truncate to the needed precision.
            $amount = bcdiv($amount, $signMultiplier, $precision);

            return new Price($amount, $price->getCurrency());
        }

        if ($this->shouldRoundUp($lastWholeDigit, $digits, $precision)) {
            // Add the rounding amount if rounding up.
            // When rounding down it's enough to just do the truncation.
            $increment = '0.' . str_repeat('0', $precision) . '5';
            $amount = bcadd($amount, $increment, $precision + 1);
        }

        // Truncate the amount to the needed precision, ensure the correct sign.
        $amount = bcdiv($amount, $signMultiplier, $precision);

        return new Price($amount, $price->getCurrency());
    }

    /**
     * @param string   $lastWholeDigit
     * @param string[] $digits
     * @param int      $precision
     *
     * @return bool
     */
    abstract protected function shouldRoundUp($lastWholeDigit, $digits, $precision);
}
