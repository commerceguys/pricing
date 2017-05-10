<?php

namespace CommerceGuys\Pricing\Tests\Rounding;

use CommerceGuys\Pricing\Rounding\AbstractRounder;

abstract class AbstractRounderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AbstractRounder
     */
    protected $rounder;

    protected function setUp()
    {
        $this->rounder = $this->createRounder();
    }

    /**
     * @return AbstractRounder
     */
    protected abstract function createRounder();

    /**
     * @return array
     */
    public abstract function getTestData();

    /**
     * @param string $amount
     * @param int    $precision
     * @param string $expectedAmount
     *
     * @dataProvider getTestData
     */
    public function testRound($amount, $precision, $expectedAmount)
    {
        $actual = $this->rounder->round($amount, $precision);

        $this->assertEquals($expectedAmount, $actual);
    }
}
