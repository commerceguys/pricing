<?php

namespace CommerceGuys\Pricing;

use CommerceGuys\Intl\Currency\CurrencyInterface;
use CommerceGuys\Pricing\Rounding\RounderInterface;

interface PriceInterface
{
    /**
     * Returns the price amount.
     *
     * @return string
     */
    public function getAmount();

    /**
     * Returns the price currency.
     *
     * @return \CommerceGuys\Intl\Currency\CurrencyInterface
     */
    public function getCurrency();

    /**
     * Converts the Price into the given currency using the given exchange rate.
     *
     * @param \CommerceGuys\Intl\Currency\CurrencyInterface $currnecy
     * @param string $rate
     *
     * @return \CommerceGuys\Pricing\Price
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function convert(CurrencyInterface $currency, $rate = '1');

    /**
     * Returns a new Price representing the sum of this Price and another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return \CommerceGuys\Pricing\Price
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function add(Price $other);

    /**
     * Returns a new Price representing the difference of this Price and another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return \CommerceGuys\Pricing\Price
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function subtract(Price $other);

    /**
     * Returns a new Price representing the value of this Price multiplied
     * by the given factor.
     *
     * @param string $factor
     *
     * @return \CommerceGuys\Pricing\Price
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function multiply($factor);

    /**
     * Returns a new Price representing the value of this Price divided
     * by the given divisor.
     *
     * @param string $divisor
     *
     * @return \CommerceGuys\Pricing\Price
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function divide($divisor);

    /**
     * Returns a new Price representing the value of this Price rounded
     * using the specified rounder.
     *
     * Defaults to the currency precision if not specified.
     *
     * @param RounderInterface|null $rounder   Object used to round the amount
     * @param integer|null          $precision The number of fraction digits to round to
     *
     * @return \CommerceGuys\Pricing\Price
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function round(RounderInterface $rounder = null, $precision = null);

    /**
     * Compares this Price to another.
     *
     * Returns an integer less than, equal to, or greater than zero
     * if the value of this Price is considered to be respectively
     * less than, equal to, or greater than the other Price.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return integer -1|0|1
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function compareTo(Price $other);

    /**
     * Returns TRUE if this Price equals another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function equals(Price $other);

    /**
     * Returns TRUE if this Price is greater than another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function greaterThan(Price $other);

    /**
     * Returns TRUE if this Price is greater than or equal to another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function greaterThanOrEqual(Price $other);

    /**
     * Returns TRUE if this Price is smaller than another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function lessThan(Price $other);

    /**
     * Returns TRUE if this Price is smaller than or equal to another.
     *
     * @param \CommerceGuys\Pricing\Price $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function lessThanOrEqual(Price $other);
}
