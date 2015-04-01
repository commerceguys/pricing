<?php

namespace CommerceGuys\Pricing\Rounding;

class UpRounder extends AbstractRounder
{
    /**
     * @param string[] $digits
     * @param int      $precision
     *
     * @return bool
     */
    protected function shouldRoundUp($digits, $precision)
    {
        return true;
    }
}
