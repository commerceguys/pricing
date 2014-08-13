<?php

namespace CommerceGuys\Pricing;

interface CurrencyInterface
{
    /**
     * Gets the ISO 4217 alphabetic currency code.
     *
     * @return string
     */
    public function getCurrencyCode();

    /**
     * Sets the ISO 4217 alphabetic currency code.
     *
     * @param string $currencyCode The alphabetic currency code.
     */
    public function setCurrencyCode($currencyCode);

    /**
     * Gets the currency name.
     *
     * @return string
     */
    public function getName();

    /**
     * Sets the currency name.
     *
     * @param string $name The currency name.
     */
    public function setName($name);

    /**
     * Gets the ISO 4217 numeric currency code.
     *
     * The numeric code has three digits, and the first one can be a zero,
     * hence the need to pass it around as a string.
     *
     * @return string
     */
    public function getNumericCode();

    /**
     * Sets the ISO 4217 numeric currency code.
     *
     * @param string $numericCode The currency number.
     */
    public function setNumericCode($numericCode);

    /**
     * Gets the currency symbol.
     *
     * @return string
     */
    public function getSymbol();

    /**
     * Sets the currency symbol.
     *
     * @param string $symbol The currency symbol.
     */
    public function setSymbol($symbol);

    /**
     * Gets the number of fraction digits.
     *
     * Used when rounding or formatting an amount for display.
     * Actual storage precision can be greater.
     *
     * @return integer
     */
    public function getFractionDigits();

    /**
     * Sets the number of fraction digits.
     *
     * @param integer $fractionDigits The number of fraction digits.
     */
    public function setFractionDigits($fractionDigits);
}
