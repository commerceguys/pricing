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
    public function getRate();

    /**
     *
     */
    public function setRate($rate);

    /**
     *
     */
    public function getDate();

    /**
     *
     */
    public function setDate($date);

    /**
     *
     */
    public function getRoundingMethod();

    /**
     *
     */
    public function setRoundingMethod($roundingMethod);
}
