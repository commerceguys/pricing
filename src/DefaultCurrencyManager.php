<?php

namespace CommerceGuys\Pricing;

use Symfony\Component\Yaml\Parser;

/**
 * Manages currencies based on ISO 4217 definitions.
 */
class DefaultCurrencyManager implements CurrencyManagerInterface
{
    /**
     * ISO 4217 currency definitions.
     *
     * @var array
     */
    protected $definitions = array();

    public function __construct()
    {
        $yaml = new Parser();
        $this->definitions = $yaml->parse(file_get_contents(__DIR__ . '/../resources/currency.yml'));
    }

    /**
     * {@inheritdoc}
     */
    public function get($currencyCode)
    {
        if (!isset($this->definitions[$currencyCode])) {
            throw new UnknownCurrencyException($currencyCode);
        }

        return $this->createCurrencyFromDefinition($this->definitions[$currencyCode]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll()
    {
        $currencies = array();
        foreach ($this->definitions as $currencyCode => $definition) {
            $currencies[$currencyCode] = $this->createCurrencyFromDefinition($definition);
        }

        return $currencies;
    }

    /**
     * Creates a currency object from the provided definition.
     *
     * @param array $definition The ISO 4217 definition.
     *
     * @return \CommerceGuys\Pricing\Currency
     */
    protected function createCurrencyFromDefinition(array $definition)
    {
        $definition += array(
            'fraction_digits' => 2,
        );

        $currency = new Currency();
        $currency->setCurrencyCode($definition['code']);
        $currency->setName($definition['name']);
        $currency->setNumericCode($definition['numeric_code']);
        $currency->setFractionDigits($definition['fraction_digits']);
        $currency->setSymbol($definition['symbol']);

        return $currency;
    }
}
