<?php

namespace CommerceGuys\Pricing\Tests\Rounding;

use CommerceGuys\Pricing\Rounding\AbstractRounder;
use CommerceGuys\Pricing\Rounding\HalfDownRounder;

class HalfDownRounderTest extends AbstractRounderTest
{
    /**
     * @return AbstractRounder
     */
    protected function createRounder()
    {
        return new HalfDownRounder();
    }

    /**
     * @return array
     */
    public function getTestData()
    {
        return array(
            array('5.050', 0, '5'),
            array('5.050', 1, '5.0'),
            array('5.050', 2, '5.05'),
            array('5.055', 0, '5'),
            array('5.055', 1, '5.0'),
            array('5.055', 2, '5.05'),
            array('5.055', 3, '5.055'),
        );
    }
}
