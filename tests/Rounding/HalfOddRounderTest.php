<?php

namespace CommerceGuys\Pricing\Tests\Rounding;

use CommerceGuys\Pricing\Rounding\AbstractRounder;
use CommerceGuys\Pricing\Rounding\HalfOddRounder;

class HalfOddRounderTest extends AbstractRounderTest
{
    /**
     * @return AbstractRounder
     */
    protected function createRounder()
    {
        return new HalfOddRounder();
    }

    /**
     * @return array
     */
    public function getTestData()
    {
        return array(
            array('5.045', 0, '5'),
            array('5.045', 1, '5.0'),
            array('5.045', 2, '5.05'),
            array('5.045', 3, '5.045'),
            array('5.055', 0, '5'),
            array('5.055', 1, '5.1'),
            array('5.055', 2, '5.05'),
            array('5.055', 3, '5.055'),
            array('5.5',   0, '5'),
        );
    }
}
