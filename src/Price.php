<?php

namespace CommerceGuys\Pricing;

class Price implements PriceInterface
{
    /**
     * The price amount.
     *
     * @var string
     */
    protected $amount;

    /**
     * The price currency.
     *
     * @var \CommerceGuys\Pricing\CurrencyInterface
     */
    protected $currency;

    /**
     * Creates a Price instance.
     *
     * @param string $amount The price amount.
     * @param \CommerceGuys\Pricing\CurrencyInterface $currency The currency.
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    public function __construct($amount, CurrencyInterface $currency)
    {
        $this->assertAmountFormat($amount);
        $this->amount = $amount;
        $this->currency = $currency;
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
        return $this->amount . ' ' . $this->currency->getCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function convert(CurrencyInterface $currency, $rate = '1')
    {
        $this->assertAmountFormat($rate);
        $value = bcmul($this->amount, $rate, 6);

        return $this->newPrice($value, $currency);
    }

    /**
     * {@inheritdoc}
     */
    public function add(Price $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = bcadd($this->amount, $other->getAmount(), 6);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function subtract(Price $other)
    {
        $this->assertSameCurrency($this, $other);
        $value = bcsub($this->amount, $other->getAmount(), 6);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function multiply($factor)
    {
        $this->assertAmountFormat($factor);
        $value = bcmul($this->amount, $factor, 6);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function divide($divisor)
    {
        $this->assertAmountFormat($divisor);
        $value = bcdiv($this->amount, $divisor, 6);

        return $this->newPrice($value);
    }

    /**
     * {@inheritdoc}
     */
    public function round($mode = self::ROUND_HALF_UP, $precision = null)
    {
        if (is_null($precision)) {
            $precision = $this->currency->getFractionDigits();
        }

        // Ensure that the amount is positive, has a decimal point and the
        // needed number of digits.
        $negative = (bccomp('0', $this->amount, 12) == 1);
        $signMultiplier = $negative ? '-1' : '1';
        $amount = bcdiv($this->amount, $signMultiplier, $precision + 1);
        // The digit evaluated for rounding purposes is the one after the
        // precision digit (amount = 5.956, precision = 2, digit = 6).
        $amountParts = explode('.', $amount);
        $digits = str_split($amountParts[1]);
        $digit = $digits[$precision];
        if ($digit == 0) {
            // No need to round, just truncate to the needed precision.
            $amount = bcdiv($amount, $signMultiplier, $precision);
            return $this->newPrice($amount);
        }

        // Determine the rounding direction based on the rounding mode and digit.
        switch ($mode) {
            case self::ROUND_HALF_UP:
                $roundUp = ($digit >= 5) ? true : false;
                break;
            case self::ROUND_HALF_DOWN:
                $roundUp = ($digit > 5) ? true : false;
                break;
            case self::ROUND_HALF_EVEN:
                if ($digit == 5) {
                    $roundUp = ($digits[$precision - 1] % 2 != 0) ? true : false;
                } else {
                    // Use the ROUND_HALF_UP logic.
                    $roundUp = ($digit > 5) ? true : false;
                }
                break;
            case self::ROUND_HALF_ODD:
                if ($digit == 5) {
                    $roundUp = ($digits[$precision - 1] % 2 == 0) ? true : false;
                } else {
                    // Use the ROUND_HALF_UP logic.
                    $roundUp = ($digit > 5) ? true : false;
                }
                break;
            case self::ROUND_UP:
                $roundUp = true;
                break;
            case self::ROUND_DOWN:
                $roundUp = false;
                break;
        }

        if ($roundUp) {
            // Add the rounding amount if rounding up.
            // When rounding down it's enough to just do the truncation.
            $increment = '0.' . str_repeat('0', $precision) . '5';
            $amount = bcadd($amount, $increment, $precision + 1);
        }
        // Truncate the amount to the needed precision, ensure the correct sign.
        $amount = bcdiv($amount, $signMultiplier, $precision);

        return $this->newPrice($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function compareTo(Price $other)
    {
        $this->assertSameCurrency($this, $other);
        return bccomp($this->amount, $other->getAmount(), 6);
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Price $other)
    {
        return $this->compareTo($other) == 0;
    }

    /**
     * {@inheritdoc}
     */
    public function greaterThan(Price $other)
    {
        return $this->compareTo($other) == 1;
    }

    /**
     * {@inheritdoc}
     */
    public function greaterThanOrEqual(Price $other)
    {
        return $this->greaterThan($other) || $this->equals($other);
    }

    /**
     * {@inheritdoc}
     */
    public function lessThan(Price $other)
    {
        return $this->compareTo($other) == -1;
    }

    /**
     * {@inheritdoc}
     */
    public function lessThanOrEqual(Price $other)
    {
        return $this->lessThan($other) || $this->equals($other);
    }

    /**
     * Ensures that the two Price instances have the same currency.
     *
     * @param \CommerceGuys\Pricing\Price $a
     * @param \CommerceGuys\Pricing\Price $b
     *
     * @throws \CommerceGuys\Pricing\CurrencyMismatchException
     */
    protected function assertSameCurrency(Price $a, Price $b)
    {
        if ($a->getCurrency() != $b->getCurrency()) {
            throw new CurrencyMismatchException;
        }
    }

    /**
     * Ensures that the provided amount is a numeric string.
     *
     * Prevents the passing of floats and strings that can't be
     * understood by bcmath (due to spaces or commas).
     *
     * @param string $amount
     *
     * @throws \CommerceGuys\Pricing\InvalidArgumentException
     */
    protected function assertAmountFormat($amount)
    {
        if (is_float($amount)) {
            throw new InvalidArgumentException(sprintf('The provided amount "%s" must be a string, not a float.', $amount));
        }
        if (!is_numeric($amount)) {
            throw new InvalidArgumentException(sprintf('The provided amount "%s" must be a valid string.', $amount));
        }
    }

    /**
     * Creates a new Price instance using the provided amount.
     *
     * Used in calculation methods to store the result in a new instance.
     *
     * @param string $amount
     * @param \CommerceGuys\Pricing\CurrencyInterface $currency
     *
     * @return \CommerceGuys\Pricing\Price The new Price instance.
     */
    protected function newPrice($amount, $currency = null)
    {
        if (strpos($amount, '.') != FALSE) {
            // The number is decimal, strip trailing zeroes.
            // If no digits remain after the decimal point, strip it as well.
            $amount = rtrim($amount, '0');
            $amount = rtrim($amount, '.');
        }
        $currency = $currency ?: $this->currency;

        return new static($amount, $currency);
    }
}
