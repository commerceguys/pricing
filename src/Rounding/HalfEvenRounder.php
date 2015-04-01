<?php

namespace CommerceGuys\Pricing\Rounding;

class HalfEvenRounder extends AbstractRounder
{
    /**
     * @param string   $lastWholeDigit
     * @param string[] $digits
     * @param int      $precision
     *
     * @return bool
     */
    protected function shouldRoundUp($lastWholeDigit, $digits, $precision)
    {
        if ($precision == 0) {
            return $lastWholeDigit % 2 != 0;
        } elseif ($digits[$precision] == 5) {
            return $digits[$precision - 1] % 2 != 0;
        } else {
            // Use the ROUND_HALF_UP logic.
            return $digits[$precision] > 5;
        }
    }
}
