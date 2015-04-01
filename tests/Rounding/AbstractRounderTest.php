<?php

namespace CommerceGuys\Pricing\Tests\Rounding;

use CommerceGuys\Intl\Currency\CurrencyInterface;
use CommerceGuys\Intl\Currency\CurrencyRepository;
use CommerceGuys\Pricing\Price;
use CommerceGuys\Pricing\Rounding\AbstractRounder;

abstract class AbstractRounderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CurrencyInterface
     */
    protected $currency;

    /**
     * @var AbstractRounder
     */
    protected $rounder;

    protected function setUp()
    {
        $currencyRepo = new CurrencyRepository();
        $this->currency = $currencyRepo->get('EUR');

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
        $price = $this->createPrice($amount);

        $actual = $this->rounder->round($price, $precision);

        $this->assertEquals($expectedAmount, $actual->getAmount());
    }

    /**
     * @param string $amount
     *
     * @dataProvider getTestData
     */
    public function testRoundWithoutPrecision($amount)
    {
        $price = $this->createPrice($amount);

        $expected = $this->rounder->round($price, $price->getCurrency()->getFractionDigits());
        $actual = $this->rounder->round($price);

        $this->assertEquals($expected->getAmount(), $actual->getAmount());
    }

    /**
     * @param string $amount
     *
     * @return Price
     */
    protected function createPrice($amount)
    {
        return new Price($amount, $this->currency);
    }
}
