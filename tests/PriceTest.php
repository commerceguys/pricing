<?php

namespace CommerceGuys\Pricing\Tests;

use CommerceGuys\Intl\Currency\CurrencyRepository;
use CommerceGuys\Pricing\Price;
use CommerceGuys\Pricing\Rounding\DownRounder;
use CommerceGuys\Pricing\Rounding\RounderInterface;
use CommerceGuys\Pricing\Rounding\UpRounder;

class PriceTest extends \PHPUnit_Framework_TestCase
{
    protected $usd;

    protected function setUp()
    {
        $currencyRepo = new CurrencyRepository();
        $this->usd = $currencyRepo->get('USD');
    }

    /**
     * @param RounderInterface|null $rounder
     * @param string                $initialAmount
     * @param int                   $precision
     * @param string                $expectedAmount
     *
     * @dataProvider dataForTestRound
     */
    public function testRound(RounderInterface $rounder = null, $initialAmount, $precision, $expectedAmount)
    {
        $price = new Price($initialAmount, $this->usd);

        $result = $price->round($rounder, $precision);

        $this->assertSame($this->usd, $result->getCurrency());
        $this->assertEquals($expectedAmount, $result->getAmount());
    }

    public function dataForTestRound()
    {
        return array(
            array(null,              '4.555', null, '4.560'),
            array(null,              '4.555', 0,    '5.000'),
            array(null,              '4.555', 1,    '4.600'),
            array(null,              '4.555', 2,    '4.560'),
            array(null,              '4.555', 3,    '4.555'),
            array(new UpRounder(),   '4.555', null, '4.560'),
            array(new UpRounder(),   '4.555', 0,    '5.000'),
            array(new UpRounder(),   '4.555', 1,    '4.600'),
            array(new UpRounder(),   '4.555', 2,    '4.560'),
            array(new UpRounder(),   '4.555', 3,    '4.555'),
            array(new DownRounder(), '4.555', null, '4.550'),
            array(new DownRounder(), '4.555', 0,    '4.000'),
            array(new DownRounder(), '4.555', 1,    '4.500'),
            array(new DownRounder(), '4.555', 2,    '4.550'),
            array(new DownRounder(), '4.555', 3,    '4.555'),
        );
    }
}
