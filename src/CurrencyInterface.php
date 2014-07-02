<?php

namespace CommerceGuys\Pricing;

interface CurrencyInterface
{
    /**
     * Gets the currency code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Sets the currency code.
     *
     * @param string $code The currency code.
     */
    public function setCode($code);

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
     * Gets the currency number.
     *
     * The currency number has three digits, and the first one can be
     * a zero, hence the need to pass it around as a string.
     *
     * @return string
     */
    public function getNumber();

    /**
     * Sets the currency number.
     *
     * @param string $number The currency number.
     */
    public function setNumber($number);

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
     * Gets the number of decimals.
     *
     * The number of decimals is used when formatting an amount for display.
     * Actual storage precision can be greater.
     *
     * @return integer
     */
    public function getDecimals();

    /**
     * Sets the number of decimals.
     *
     * @param integer $decimals The number of decimals.
     */
    public function setDecimals($decimals);

    /**
     * Gets the rounding step.
     *
     * For example Swiss Francs use a rounding step of 0.05. This means a
     * price like 10.93 is converted to 10.95. Currently only the steps
     * 0.5,0.05... and 0.2, 0.02 ... are supported. This value has to be
     * defined as string, otherwise the rounding results can be unpredictable.
     *
     * @return string
     */
    public function getRoundingStep();

    /**
     * Sets the rounding step.
     *
     * @param string $roundingStep The rounding step.
     */
    public function setRoundingStep($roundingStep);
}
