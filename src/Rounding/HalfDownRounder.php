<?php

namespace CommerceGuys\Pricing\Rounding;

class HalfDownRounder extends AbstractRounder
{
    /**
     * @param string[] $digits
     * @param int      $precision
     *
     * @return bool
     */
    protected function shouldRoundUp($digits, $precision)
    {
        return $digits[$precision] > 5;
    }
}
