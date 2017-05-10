<?php

namespace CommerceGuys\Pricing\Rounding;

interface RounderInterface
{
    /**
     * @param string $amount
     * @param int    $precision
     *
     * @return string
     */
    public function round($amount, $precision);
}
