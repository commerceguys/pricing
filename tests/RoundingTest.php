<?php

namespace CommerceGuys\Pricing;

use CommerceGuys\Intl\Currency\DefaultCurrencyManager;

class RoundingTest extends \PHPUnit_Framework_TestCase
{

  /**
   * @covers \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Pricing\Price::__construct
   * @uses \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Intl\Currency\DefaultCurrencyManager
   */
  public function testRoundingDefault() {
    // Default precision for EUR is 2.
    $currencyManager = new DefaultCurrencyManager;
    $currency = $currencyManager->get('EUR');

    $price = new Price('5.045', $currency);
    $this->assertEquals(5.05, $price->round()->getAmount());

    $price = new Price('5.055', $currency);
    $this->assertEquals(5.06, $price->round()->getAmount());
  }

  /**
   * @covers \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Pricing\Price::__construct
   * @uses \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Intl\Currency\DefaultCurrencyManager
   */
  public function testRoundingWithPrecision() {
    $currencyManager = new DefaultCurrencyManager;
    $currency = $currencyManager->get('EUR');
    $mode = Price::ROUND_HALF_UP;

    $price = new Price('3.4', $currency);
    $this->assertEquals(3, $price->round($mode, 0)->getAmount());

    $price = new Price('3.5', $currency);
    $this->assertEquals(4, $price->round($mode, 0)->getAmount());

    $price = new Price('3.6', $currency);
    $this->assertEquals(4, $price->round($mode, 0)->getAmount());

  }

  /**
   * @covers \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Pricing\Price::__construct
   * @uses \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Intl\Currency\DefaultCurrencyManager
   * @expectedException \CommerceGuys\Pricing\InvalidArgumentException
   */
  public function testRoundingWithNegativePrecision() {
    $currencyManager = new DefaultCurrencyManager;
    $currency = $currencyManager->get('EUR');
    $mode = Price::ROUND_HALF_UP;

    $price = new Price('1241757', $currency);
    $price->round($mode, -3);
  }

  /**
   * @covers \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Pricing\Price::__construct
   * @uses \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Intl\Currency\DefaultCurrencyManager
   */
  public function testRoundingWithMode() {
    $currencyManager = new DefaultCurrencyManager;
    $currency = $currencyManager->get('EUR');

    $price = new Price('9.5', $currency);
    $this->assertEquals(10, $price->round(Price::ROUND_HALF_UP, 0)->getAmount());

    $price = new Price('9.5', $currency);
    $this->assertEquals(9, $price->round(Price::ROUND_HALF_DOWN, 0)->getAmount());

    $price = new Price('9.5', $currency);
    $this->assertEquals(10, $price->round(Price::ROUND_HALF_EVEN, 0)->getAmount());

    $price = new Price('9.5', $currency);
    $this->assertEquals(9, $price->round(Price::ROUND_HALF_ODD, 0)->getAmount());

    $price = new Price('8.5', $currency);
    $this->assertEquals(9, $price->round(Price::ROUND_HALF_UP, 0)->getAmount());

    $price = new Price('8.5', $currency);
    $this->assertEquals(8, $price->round(Price::ROUND_HALF_DOWN, 0)->getAmount());

    $price = new Price('8.5', $currency);
    $this->assertEquals(8, $price->round(Price::ROUND_HALF_EVEN, 0)->getAmount());

    $price = new Price('8.5', $currency);
    $this->assertEquals(9, $price->round(Price::ROUND_HALF_ODD, 0)->getAmount());
  }

  /**
   * @covers \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Pricing\Price::__construct
   * @uses \CommerceGuys\Pricing\Price::round
   * @uses \CommerceGuys\Intl\Currency\DefaultCurrencyManager
   */
  public function testRoundingWithModeAndPrecision() {
    $currencyManager = new DefaultCurrencyManager;
    $currency = $currencyManager->get('EUR');

    $price = new Price('1.55', $currency);
    $this->assertEquals(1.6, $price->round(Price::ROUND_HALF_UP, 1)->getAmount());
    $price = new Price('1.54', $currency);
    $this->assertEquals(1.5, $price->round(Price::ROUND_HALF_UP, 1)->getAmount());
    $price = new Price('-1.55', $currency);
    $this->assertEquals(-1.6, $price->round(Price::ROUND_HALF_UP, 1)->getAmount());
    $price = new Price('-1.54', $currency);
    $this->assertEquals(-1.5, $price->round(Price::ROUND_HALF_UP, 1)->getAmount());

    $price = new Price('1.55', $currency);
    $this->assertEquals(1.5, $price->round(Price::ROUND_HALF_DOWN, 1)->getAmount());
    $price = new Price('1.54', $currency);
    $this->assertEquals(1.5, $price->round(Price::ROUND_HALF_DOWN, 1)->getAmount());
    $price = new Price('-1.55', $currency);
    $this->assertEquals(-1.5, $price->round(Price::ROUND_HALF_DOWN, 1)->getAmount());
    $price = new Price('-1.54', $currency);
    $this->assertEquals(-1.5, $price->round(Price::ROUND_HALF_DOWN, 1)->getAmount());

    $price = new Price('1.55', $currency);
    $this->assertEquals(1.6, $price->round(Price::ROUND_HALF_EVEN, 1)->getAmount());
    $price = new Price('1.54', $currency);
    $this->assertEquals(1.5, $price->round(Price::ROUND_HALF_EVEN, 1)->getAmount());
    $price = new Price('-1.55', $currency);
    $this->assertEquals(-1.6, $price->round(Price::ROUND_HALF_EVEN, 1)->getAmount());
    $price = new Price('-1.54', $currency);
    $this->assertEquals(-1.5, $price->round(Price::ROUND_HALF_EVEN, 1)->getAmount());

    $price = new Price('1.55', $currency);
    $this->assertEquals(1.5, $price->round(Price::ROUND_HALF_ODD, 1)->getAmount());
    $price = new Price('1.54', $currency);
    $this->assertEquals(1.5, $price->round(Price::ROUND_HALF_ODD, 1)->getAmount());
    $price = new Price('-1.55', $currency);
    $this->assertEquals(-1.5, $price->round(Price::ROUND_HALF_ODD, 1)->getAmount());
    $price = new Price('-1.54', $currency);
    $this->assertEquals(-1.5, $price->round(Price::ROUND_HALF_ODD, 1)->getAmount());
  }

}
