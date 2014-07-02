<?php

namespace CommerceGuys\Pricing;

class Currency implements CurrencyInterface
{
    /**
     * The currency code.
     *
     * Uppercase alphabetic, i.e. EUR.
     *
     * @var string
     */
    protected $code;

    /**
     * The currency name.
     *
     * @var string
     */
    protected $name;

    /**
     * The currency number.
     *
     * @var string
     */
    protected $number;

    /**
     * The currency symbol.
     *
     * @var string
     */
    protected $symbol;

    /**
     * The number of decimals.
     *
     * @var integer
     */
    protected $decimals;

    /**
     * The rounding step.
     *
     * @var string
     */
    protected $roundingStep;

    /**
     * {@inheritdoc}
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumber($number) {
        $this->number = $number;
    }

    /**
     * {@inheritdoc}
     */
    public function getSymbol() {
        return $this->symbol;
    }

    /**
     * {@inheritdoc}
     */
    public function setSymbol($symbol) {
        $this->symbol = $symbol;
    }

    /**
     * {@inheritdoc}
     */
    public function getDecimals() {
        return $this->decimals;
    }

    /**
     * {@inheritdoc}
     */
    public function setDecimals($decimals) {
        $this->decimals = $decimals;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoundingStep() {
        return $this->roundingStep;
    }

    /**
     * {@inheritdoc}
     */
    public function setRoundingStep($roundingStep) {
        $this->roundingStep = $roundingStep;
    }
}
