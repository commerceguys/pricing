<?php

namespace CommerceGuys\Pricing;

use CommerceGuys\Intl\Currency\CurrencyInterface;

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
     * @param PriceInterface $other
     *
     * @return PriceInterface
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function add(PriceInterface $other);

    /**
     * Returns a new Price representing the difference of this Price and another.
     *
     * @param PriceInterface
     *
     * @return PriceInterface
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function subtract(PriceInterface $other);

    /**
     * Returns a new Price representing the value of this Price multiplied
     * by the given factor.
     *
     * @param string $factor
     *
     * @return PriceInterface
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
     * @return PriceInterface
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function divide($divisor);

    /**
     * Compares this Price to another.
     *
     * Returns an integer less than, equal to, or greater than zero
     * if the value of this Price is considered to be respectively
     * less than, equal to, or greater than the other Price.
     *
     * @param PriceInterface $other
     *
     * @return integer -1|0|1
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function compareTo(PriceInterface $other);

    /**
     * Returns TRUE if this Price equals another.
     *
     * @param PriceInterface $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function equals(PriceInterface $other);

    /**
     * Returns TRUE if this Price is greater than another.
     *
     * @param PriceInterface $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function greaterThan(PriceInterface $other);

    /**
     * Returns TRUE if this Price is greater than or equal to another.
     *
     * @param PriceInterface $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function greaterThanOrEqual(PriceInterface $other);

    /**
     * Returns TRUE if this Price is smaller than another.
     *
     * @param PriceInterface $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function lessThan(PriceInterface $other);

    /**
     * Returns TRUE if this Price is smaller than or equal to another.
     *
     * @param PriceInterface $other
     *
     * @return boolean
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    public function lessThanOrEqual(PriceInterface $other);
}
