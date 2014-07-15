<?php

namespace CommerceGuys\Pricing;

class Currency implements CurrencyInterface
{
    /**
     * The alphanumeric currency code.
     *
     * @var string
     */
    protected $currencyCode;

    /**
     * The currency name.
     *
     * @var string
     */
    protected $name;

    /**
     * The numeric currency code.
     *
     * @var string
     */
    protected $numericCode;

    /**
     * The currency symbol.
     *
     * @var string
     */
    protected $symbol;

    /**
     * The number of decimals.
     *
     * @var int
     */
    protected $decimals;

    /**
     * {@inheritdoc}
     */
    public function getCurrencyCode() {
        return $this->currencyCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrencyCode($currencyCode) {
        $this->currencyCode = $currencyCode;

        return $this;
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

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getNumericCode() {
        return $this->numericCode;
    }

    /**
     * {@inheritdoc}
     */
    public function setNumericCode($numericCode) {
        $this->numericCode = $numericCode;

        return $this;
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

        return $this;
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

        return $this;
    }
}
