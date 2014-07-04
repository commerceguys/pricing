<?php

namespace CommerceGuys\Pricing;

interface TaxInterface
{
    /**
     * Gets the tax code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Sets the tax code.
     *
     * @param string $taxCode The tax code.
     */
    public function setCode($taxcode);

    /**
     *  Gets the tax name.
     *
     *  @return string
     */
    public function getName();

    /**
     *  Sets the tax name.
     *
     *  @param string The tax name.
     */
    public function setName($name);

    /**
     *  Gets the tax type.
     *
     *  @return string
     */
    public function getType();

    /**
     *  Sets the tax type.
     *
     *  @param string The tax type name.
     */
    public function setType($type);

    /**
     *  Get the tax rate as a decimal
     *
     *  @return float
     */
    public function getRate();

    /**
     *  Get the tax rate as a percentage
     *
     *  @return float
     */
    public function getPercentRate();

    /**
     *  Get the tax rate formatted for display.
     *
     *  @return float
     */
    public function getFormattedRate();

    /**
     *  Set the tax rate
     *
     *  @param float The tax rate as a decimal
     */
    public function setRate($rate);

    /**
     *  Set the tax rate
     *
     *  @param float The tax rate as a percent
     */
    public function setPercentRate($rate);

    /**
     *  Get the start date for this tax.
     *    Returns a timestamp formatted date.
     *
     *  @return int
     */
    public function getDate();

    /**
     *  Set the start date for this tax.
     *
     *  @param mixed The start date in ISO format or timestamp.
     */
    public function setDate($date);

    /**
     *  Get the rounding method for this tax.
     *
     *  @return string
     */
    public function getRoundingMethod();

    /**
     *  Set the rounding method for this tax.
     *
     *  @param string Rounding method.
     */
    public function setRoundingMethod($roundingMethod);
}
