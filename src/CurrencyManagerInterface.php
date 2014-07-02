<?php

namespace CommerceGuys\Pricing;

/**
 * Currency manager interface.
 *
 * Currency managers are responsible for returning currency instances
 * and lists of currencies.
 */
interface CurrencyManagerInterface
{
    /**
     * Returns a currency instance matching the provided currency code.
     *
     * @param string $currencyCode The currency code.
     *
     * @return \CommerceGuys\Pricing\CurrencyInterface
     */
    public function getCurrency($currencyCode);

    /**
     * Returns a list of currencies.
     *
     * @return array An array of currencies implementing the CurrencyInterface.
     */
    public function getCurrencies();
}
