<?php

namespace CommerceGuys\Pricing\Tests\Rounding;

use CommerceGuys\Pricing\Rounding\AbstractRounder;
use CommerceGuys\Pricing\Rounding\HalfUpRounder;

class HalfUpRounderTest extends AbstractRounderTest
{
    /**
     * @return AbstractRounder
     */
    protected function createRounder()
    {
        return new HalfUpRounder();
    }

    /**
     * @return array
     */
    public function getTestData()
    {
        return array(
            array('5.050', 0, '5'),
            array('5.050', 1, '5.1'),
            array('5.050', 2, '5.05'),
            array('5.055', 0, '5'),
            array('5.055', 1, '5.1'),
            array('5.055', 2, '5.06'),
            array('5.055', 3, '5.055'),
        );
    }
}
