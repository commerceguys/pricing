<?php

namespace CommerceGuys\Pricing;

interface TaxInterface
{
    /**
     *
     */
    public function getCode();

    /**
     *
     */
    public function setCode($code);

    /**
     *
     */
    public function getName();

    /**
     *
     */
    public function setName($name);

    /**
     *
     */
    public function getRates();

    /**
     *
     */
    public function setRates($rates);

    /**
     *
     */
    public function getDecimals();

    /**
     *
     */
    public function setDecimals($decimals);

    /**
     *
     */
    public function getRoundingStep();

    /**
     *
     */
    public function setRoundingStep($roundingStep);
}
