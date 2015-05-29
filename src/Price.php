<?php

namespace CommerceGuys\Pricing;

use CommerceGuys\Intl\Currency\CurrencyInterface;

class Price implements PriceInterface
{
    
    // Default max number of decimals
    const PRECISION = 6;
    
    /**
     * The price amount.
     *
     * @var string
     */
    protected $amount;

    /**
     * The price currency.
     *
     * @var \CommerceGuys\Intl\Currency\CurrencyInterface
     */
    protected $currency;
    
    /**
     * Max number of decimals
     *
     * @var int
     */
    protected $precision;

    /**
     * Creates a Price instance.
     *
     * @param string $amount The price amount.
     * @param \CommerceGuys\Intl\Currency\CurrencyInterface $currency The currency.
     * @param int Number of decimals
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function __construct($amount, CurrencyInterface $currency, $precision = static::PRECISION)
    {
        $this->amount = $this->prepareAmount($amount);
        $this->currency = $currency;
        $this->precision = (int) $precision;
    }
    
    /**
     * Prepares price amount value
     *
     * @param int|float|string|PriceInterface $amount The price amount
     *
     * @return int|string Amount
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    protected function prepareAmount($amount) {
        if (is_int($amount)) {
            return $amount;
        }
        
        if (is_float($amount)) {
            return number_format($amount, $this->precision, '.', '');
        }
        
        if (is_object($amount) && ($amount instanceof PriceInterface)) {
            return $amount->getAmount();
        }
        
        if (is_string($amount)) {
            // Remove spaces and convert comma to dot
            $amount = strtr($amount, array(
               ' ' => '',
               ',' => '.',
            ));
            // Check if the string is a valid number.
            if (is_numeric($amount)) {
                // Hexa or binary
                if (stripos($amount, '0x') !== false || stripos($amount, '0b') !== false) {
                    return (int) $amount;
                }
                // Exponent
                if (stripos($amount, 'e') !== false) {
                    return number_format((float) $amount, $this->precision, '.', '');
                }
                // Normal number
                return $amount;
            }
        }
        
        throw new InvalidArgumentException(sprintf('The provided amount "%s" must be a valid number.', $amount));
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Returns the string representation of the price (amount, currency code).
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getAmount() . ' ' . $this->currency->getCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function convert(CurrencyInterface $currency, $rate = '1')
    {
        if ($rate == 1) {
            $value = $this->getAmount();
        }
        else {
            $rate = $this->prepareAmount($rate);
            $value = bcmul($this->getAmount(), $rate, $this->precision);
        }

        return $this->newPrice($value, $currency);
    }

    /**
     * {@inheritdoc}
     */
    public function add(PriceInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = bcadd($this->getAmount(), $other->getAmount(), $this->precision);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function subtract(PriceInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = bcsub($this->getAmount(), $other->getAmount(), $this->precision);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function multiply($factor)
    {
        $factor = $this->prepareAmount($factor);
        $value = bcmul($this->getAmount(), $factor, $this->precision);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function divide($divisor)
    {
        $divisor = $this->prepareAmount($divisor);
        $value = bcdiv($this->getAmount(), $divisor, $this->precision);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function compareTo(PriceInterface $other)
    {
        $this->assertSameCurrency($this, $other);
        return bccomp($this->getAmount(), $other->getAmount(), $this->precision);
    }

    /**
     * {@inheritdoc}
     */
    public function equals(PriceInterface $other)
    {
        return $this->compareTo($other) == 0;
    }

    /**
     * {@inheritdoc}
     */
    public function greaterThan(PriceInterface $other)
    {
        return $this->compareTo($other) > 0;
    }

    /**
     * {@inheritdoc}
     */
    public function greaterThanOrEqual(PriceInterface $other)
    {
        return $this->compareTo($other) >= 0;
    }

    /**
     * {@inheritdoc}
     */
    public function lessThan(PriceInterface $other)
    {
        return $this->compareTo($other) < 0;
    }

    /**
     * {@inheritdoc}
     */
    public function lessThanOrEqual(PriceInterface $other)
    {
        return $this->compareTo($other) <= 0;
    }
    
    /**
     * Ensures that the two Price instances have the same currency.
     *
     * @param \CommerceGuys\Pricing\PriceInterface $a
     * @param \CommerceGuys\Pricing\PriceInterface $b
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    protected function assertSameCurrency(PriceInterface $a, PriceInterface $b)
    {
        if ($a->getCurrency() != $b->getCurrency()) {
            throw new CurrencyMismatchException;
        }
    }

    /**
     * Creates a new Price instance using the provided amount.
     *
     * Used in calculation methods to store the result in a new instance.
     *
     * @param string $amount
     * @param \CommerceGuys\Intl\Currency\CurrencyInterface $currency
     *
     * @return \CommerceGuys\Pricing\Price The new Price instance.
     */
    protected function newPrice($amount, $currency = null)
    {
        return new static($amount, $currency ?: $this->currency);
    }
}
