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
     * @param string $locale The currency locale (i.e. en_US).
     *
     * @return \CommerceGuys\Pricing\CurrencyInterface
     */
    public function get($currencyCode, $locale = 'en_US');

    /**
     * Returns all available currency instances.
     *
     * @param string $locale The currency locale (i.e. en_US).
     *
     * @return array An array of currencies implementing the CurrencyInterface,
     *               keyed by currency code.
     */
    public function getAll($locale = 'en_US');
}
