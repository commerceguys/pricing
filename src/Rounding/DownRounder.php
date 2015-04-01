<?php

namespace CommerceGuys\Pricing\Rounding;

class DownRounder extends AbstractRounder
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
        return false;
    }
}
