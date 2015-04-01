<?php

namespace CommerceGuys\Pricing\Rounding;

class HalfEvenRounder extends AbstractRounder
{
    /**
     * @param string[] $digits
     * @param int      $precision
     *
     * @return bool
     */
    protected function shouldRoundUp($digits, $precision)
    {
        if ($digits[$precision] == 5) {
            return $digits[$precision - 1] % 2 != 0;
        } else {
            // Use the ROUND_HALF_UP logic.
            return $digits[$precision] > 5;
        }
    }
}
