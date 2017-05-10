<?php

namespace CommerceGuys\Pricing\Rounding;

use CommerceGuys\Pricing\InvalidArgumentException;

abstract class AbstractRounder implements RounderInterface
{
    /**
     * @param string $amount
     * @param int    $precision
     *
     * @return string
     */
    public function round($amount, $precision)
    {
        if ($precision < 0) {
            throw new InvalidArgumentException('The provided precision should be a positive number');
        }

        // Ensure that the amount is positive, has a decimal point and the
        // needed number of digits.
        $negative = (bccomp('0', $amount, 12) == 1);
        $signMultiplier = $negative ? '-1' : '1';
        $amount = bcdiv($amount, $signMultiplier, $precision + 1);
        // The digit evaluated for rounding purposes is the one after the
        // precision digit (amount = 5.956, precision = 2, digit = 6).
        $amountParts = explode('.', $amount);
        $lastWholeDigit = substr($amountParts[0], -1);
        $digits = str_split($amountParts[1]);
        $digit = $digits[$precision];

        if ($digit == 0) {
            // No need to round, just truncate to the needed precision.
            $amount = bcdiv($amount, $signMultiplier, $precision);

            return $amount;
        }

        if ($this->shouldRoundUp($lastWholeDigit, $digits, $precision)) {
            // Add the rounding amount if rounding up.
            // When rounding down it's enough to just do the truncation.
            $increment = '0.' . str_repeat('0', $precision) . '5';
            $amount = bcadd($amount, $increment, $precision + 1);
        }

        // Truncate the amount to the needed precision, ensure the correct sign.
        $amount = bcdiv($amount, $signMultiplier, $precision);

        return $amount;
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
